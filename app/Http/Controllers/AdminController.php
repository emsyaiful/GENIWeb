<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use JWTAuth;
use Carbon;

class AdminController extends Controller
{
	public function getUser(Request $request) {
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
}
