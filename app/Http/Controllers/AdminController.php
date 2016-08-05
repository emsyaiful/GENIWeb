<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use JWTAuth;

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
		$user->user_name = $input['name'];
		$user->user_email = $input['email'];
		$user->user_company = $input['company'];
		$user->user_addresscompany = $input['address'];
		$user->user_typecompany = $input['typecompany'];
		$user->save();
		return response()->json(['result'=>true]);
	}
}
