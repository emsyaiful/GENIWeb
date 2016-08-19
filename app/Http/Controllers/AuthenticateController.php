<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Models\Billing;
use JWTAuth;
use Hash;
use Redirect;
use Session;
use URL;
use Mail;

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
            $where = array('user_email' => $input['user_email'], 'user_name' => $input['user_name']);
            $user = User::where($where)->first();
            $billing = new Billing;
            $billing->fk_user_id = $user->id;
            $billing->billing_date = date('Y-m-d');
            $billing->billing_duedate = Date('Y-m-d', strtotime("+15 days"));
            $billing->billing_activeperiod = 15;
            $billing->billing_remainingperiod = 15;
            $billing->billing_status = 'Trial';
            $billing->billing_isactive = 1;
            $billing->save();

            return response()->json(['result' => 'success']);
        }
    }
    public function login(Request $request)
    {
        $input = $request->only('user_email', 'password');
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
        if ($user->deleted_at != null) {
            return response()->json(['error' => 'user not found'], 404);
        }else{
            $user->token = $token;
            return response()->json($user);
        }
    }
    public function restPass(Request $request) {
        $email = Session::get('user_email');
        Session::forget('user_email');
        $where = array('user_email' => $email);
        $user = User::where($where)->first();
        $user->user_tokenrest = Hash::make($email.$request->input('password'));
        $user->password = Hash::make($request->input('password'));
        $user->save();
        // return response()->json($user);
    }
    public function getFormPass($email, $token) {
        $where = array('user_email' => $email);
        $user = User::where($where)->first();
        if ($user->user_tokenrest == $token) {
            // session()->flash('user_email', $email);
            Session::set('user_email', $email);
            return redirect('/restpassword');
            // return response()->json(['success' => 'redirect']);
        }else{
            // return response()->json(['error' => 'invalid link'], 401);
            return response()->view('pages/404');
        }
    }
    public function sendmail(Request $request) {
        $where = array('user_email' => $request->input('user_email'));
        $user = User::where($where)->first();
        $base = URL::to("/");
        $link = $base.'/'.$request->input('user_email').'/'.$user->user_tokenrest;
        Mail::send('emails.send', ['title' => 'Reset Password', 'content' => $link], function ($m) use ($user) {
            $m->from('noreply@geni.co.id', 'GENI SAAS Support');
            $m->to($user->user_email, $user->user_name)->subject('Link for reset password');
        });
        return response()->json($link);
    }
}
