<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Response;
use App\Http\Requests;
use App\Models\Userlist;
use App\User;
use Hash;
use JWTAuth;

class AuthenticateController extends Controller
{
    public function register(Request $request)
    {   
        $input = $request->all();
        if (User::where('user_email', '=', $input['user_email'])->exists()) {
            return response()->json(['result' => 'exist']);
        }else {
            $input = $request->all();
            $input['password'] = Hash::make('defaultPass');
            $genRest = $input['user_email'].'defaultPass';
            $input['user_tokenrest'] = Hash::make($genRest);
            User::create($input);
            return response()->json(['result'=>true]);
        }
    }
    public function login(Request $request)
    {
        $input = $request->all();
        try {
            // verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($input)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        $user = JWTAuth::toUser($token);
        return response()->json($user);
    }
    public function restPass(Request $request)
    {
        if ($request->isMethod('get')) {
            $input = $request->all();
            $where = array('user_email' => $input['email'], 'user_tokenrest' => $input['token']);
            $user = User::where($where)->first();
            if (!$user) {
                return response()->json(['error' => 'error token missmatch'], 401);
            }else
                return response()->json(['result'=>true]);
        }else {
            
        }
    }
}
