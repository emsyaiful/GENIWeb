<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use JWTAuth;
use Carbon;
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
		$user = User::where($where)->get();
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
		$payment = Payment::all();
		return response()->json($payment);
	}
	public function confirmPay(Request $request) {
		$input = $request->all();
		$id = $input['payment_id'];
		$payment = Payment::find($id);
		$payment->payment_isconfirmed = 1;
		$payment->save();
	}
	public function getRiwayat() {
		$where = array('payment_isconfirmed' => 1);
		$riwayat = Payment::where($where)->get();
		return response()->json($riwayat);
	}
	public function getPesan() {
		$where = array('deleted_at' => null);
		$pesan = Pesan::where($where)->get();
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
		$berita = Berita::where($where)->get();
		return response()->json($berita);
	}
	public function pubBerita(Request $request) {
		$input = $request->all();
		$destinationPath = 'uploads';
		$extension = $request->file('file')->getClientOriginalExtension();
		$fileName = rand(11111,99999).'.'.$extension;
		if (!isset($input['news_id'])) {
			$insert = array(
				'news_title' => $request->input('title'),
				'news_content' => $request->input('content'),
				'news_image' => $destinationPath.'/'.$fileName,
				'news_timecreated' => Carbon\Carbon::now()
			);
			Berita::create($insert);
		}else{
			$id = $input['news_id'];
			$berita = Berita::find($id);
			$berita->news_title = $input['news_title'];
			$berita->news_content = $input['news_content'];
			$berita->news_image = $input['news_image'];
			$berita->news_timecreated = Carbon\Carbon::now();
			$berita->save();
		}
		
		$request->file('file')->move($destinationPath, $fileName);
		// return response()->json($input);
	}
	public function delBerita($id) {
		$berita = Berita::find($id);
		$berita->deleted_at = Carbon\Carbon::now();
		$berita->save();
	}
	public function getTagihan() {
		$tagihan = Billing::with('user')->get();
		return response()->json($tagihan);
	}
}
