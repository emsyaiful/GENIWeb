<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use JWTAuth;
use Carbon;
use Validator;
use App\Models\Payment;
use App\Models\Pesan;
use App\Models\Berita;
use App\Models\Billing;

class AdminController extends Controller
{
	public function getLogged(Request $request) {
		$user = JWTAuth::toUser($request->header('Authorization'));
		return response()->json($user);
	}
	public function getUser() {
		$where = array('deleted_at' => null);
		$user = User::where($where)->orderBy('user_timecreated','DESC')->get();
		return response()->json($user);
	}
	public function alterUser(Request $request) {
		$input = $request->all();
		$id = $input['id'];
		$user = User::find($id);
		$user->user_name = $input['user_name'];
		$user->user_email = $input['user_email'];
		$user->user_company = $input['user_company'];
		$user->user_addresscompany = $input['user_addresscompany'];
		$user->user_typecompany = $input['user_typecompany'];
		$user->save();
	}
	public function delUser(Request $request) {
		$input = $request->all();
		$id = $input['id'];
		$user = User::find($id);
		$user->deleted_at = Carbon\Carbon::now();
		$user->save();
	}
	public function getPay() {
		// $payment = Payment::all();
		$payment = Payment::orderBy('payment_timecreated','DESC')->get();
		return response()->json($payment);
	}
	public function confirmPay(Request $request) {
		$input = $request->all();
		$id = $input['payment_id'];
		$payment = Payment::find($id);
		$payment->payment_isconfirmed = 1;
		$payment->save();
		$where = array('user_email' => $request->input('payment_email'), 'deleted_at' => null);
		$user = User::where($where)->first();
		$where = array('fk_user_id' => $user->id);
		$billing = Billing::where($where)->first();
		$newDate = $request->payment_month * 30;
		if (time() > strtotime($billing->billing_duedate)) {
			$billing_duedate = Date('Y-m-d', strtotime('+'.$newDate.' Days'));
		}else{
			$billing->billing_duedate = Date('Y-m-d', strtotime('+'.$newDate.' days', strtotime($billing->billing_duedate)));	
		}
		$billing->billing_activeperiod = $billing->billing_activeperiod + $newDate;
		$billing->billing_remainingperiod = $billing->billing_remainingperiod + $newDate;
		$billing->billing_isactive = 1;
		$billing->billing_status = 'Active';
		$billing->save();
		// return response()->json($billing);
	}
	public function getRiwayat($email) {
		$where = array('payment_email' => $email);
		$detail = Payment::join('gen_0101_user', 'payment_email', '=', 'gen_0101_user.user_email')
				->join('gen_0301_billing', 'gen_0101_user.id', '=', 'gen_0301_billing.fk_user_id')
				->where($where)->get();
		if (count($detail) == 0) {
			return response()->json(['success' => 'Tidak ada riwayat pembayaran '.$email]);
		}else{
			return response()->json($detail);
		}
	}
	public function getPesan() {
		$where = array('deleted_at' => null);
		$pesan = Pesan::where($where)->orderBy('contact_timecreated','DESC')->get();
		return response()->json($pesan);
	}
	public function delPesan(Request $request) {
		$input = $request->all();
		$id = $input['contact_id'];
		$pesan = Pesan::find($id);
		$pesan->deleted_at = Carbon\Carbon::now();
		$pesan->save();
	}
	public function getBerita() {
		$where = array('deleted_at' => null);
		$berita = Berita::where($where)->orderBy('news_timecreated','DESC')->get();
		return response()->json($berita);
	}
	public function pubBerita(Request $request) {
		$input = $request->all();
		$destinationPath = 'uploads';
		$file = $request->file('file');
	    $fileArray = array('image' => $file);
	    $rules = array(
	      'image' => 'mimes:jpeg,jpg,png|required|max:1000'
	    );
	    // return response()->json($input);
	    $validator = Validator::make($fileArray, $rules);
		if ($request->input('news_id') == 'undefined') {
			if ($validator->fails()){
		        $insert = array(
					'news_title' => $request->input('title'),
					'news_content' => $request->input('content'),
					'news_image' => null,
					'news_timecreated' => Carbon\Carbon::now()
				);
				Berita::create($insert);
		    }else{
				$extension = $request->file('file')->getClientOriginalExtension();
				$fileName = rand(11111,99999).'.'.$extension;
		        $insert = array(
					'news_title' => $request->input('title'),
					'news_content' => $request->input('content'),
					'news_image' => $destinationPath.'/'.$fileName,
					'news_timecreated' => Carbon\Carbon::now()
				);
				Berita::create($insert);
				$request->file('file')->move($destinationPath, $fileName);
		    };
		}else{
			if ($validator->fails()){
		        $id = $input['news_id'];
				$berita = Berita::find($id);
				$berita->news_title = $request->input('title');
				$berita->news_content = $request->input('content');
				$berita->news_timecreated = Carbon\Carbon::now();
				$berita->save();
				return response()->json(['success' => 'masuk sini']);
		    }else{
		    	$extension = $request->file('file')->getClientOriginalExtension();
				$fileName = rand(11111,99999).'.'.$extension;
		        $id = $input['news_id'];
				$berita = Berita::find($id);
				$berita->news_title = $request->input('title');
				$berita->news_content = $request->input('content');
				$berita->news_image = $destinationPath.'/'.$fileName;
				$berita->news_timecreated = Carbon\Carbon::now();
				$berita->save();
				$request->file('file')->move($destinationPath, $fileName);
		    };
		}
		
		// $request->file('file')->move($destinationPath, $fileName);
		// return response()->json($input);
	}
	public function delBerita($id) {
		$berita = Berita::find($id);
		$berita->deleted_at = Carbon\Carbon::now();
		$berita->save();
	}
	public function postConfirm(Request $request) {
		$where = array('user_email' => $request->input('payment_email'), 'deleted_at' => null);
		$user = User::where($where)->first();
		if (is_null($user)) {
			return response()->json(['error' => 'Email not found']);
		}
		else{
			$file = $request->file('file');
		    $fileArray = array('image' => $file);
		    $rules = array(
		      'image' => 'mimes:jpeg,jpg,png|required|max:1000'
		    );
		    $validator = Validator::make($fileArray, $rules);
		    if ($validator->fails()){
		        return response()->json(['error' => 'Bukti harus .png atau .jpg dan kurang dari 1Mb']);
		    } else{
		        $file = $request->file('file');
				$destinationPath = 'uploads/payment';
				$extension = $request->file('file')->getClientOriginalExtension();
				$fileName = rand(11111,99999).'.'.$extension;
				$insert = array(
					'payment_username' => $request->input('payment_username'),
					'payment_email' => $request->input('payment_email'),
					'payment_bank' => $request->input('payment_bank'),
					'payment_description' => $request->input('payment_description'),
					'payment_month' => $request->input('payment_month'),
					'payment_payslip' => $destinationPath.'/'.$fileName,
					'payment_timecreated' => Carbon\Carbon::now()
				);	
				Payment::create($insert);
				$request->file('file')->move($destinationPath, $fileName);
		    };
		}	
	}
	public function getTagihan() {
		$tagihan = Billing::with('user')->orderBy('billing_isactive','DESC')->get();
		foreach ($tagihan as $key => $value) {
			$diff = date_diff(date_create($value->billing_duedate),date_create(date('Y-m-d h:i:sa')));
			$value->billing_remainingperiod = $diff->format("%a")+1;
 		}
		return response()->json($tagihan);
	}
}

