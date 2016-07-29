<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Response;
use Hash;
use App\Http\Requests;
use App\Models\Userlist;
use App\Models\ContactModel;
use App\User;

class UserController extends Controller
{
    public function getUser(){
    	$user = Userlist::all();
    	return Response::json($user);
    }

    public function hash() {
    	$login = User::all();
    	foreach ($login as $key => $value) {
    		if (Hash::needsRehash($value->password)) {
    			$hashed = Hash::make($value->password);
    			$value->password = $hashed;
    			$value->save();
    		}
    	}
    }

    public function contactUs(Request $request) {
        $name = $request->input('name');
        $email = $request->input('email');
        $subject = $request->input('subject');
        $message = $request->input('message');

        if (!empty($name) && !empty($email) && !empty($message)) {
            $contact = new ContactModel();
            $contact->contact_name = $name;
            $contact->contact_email = $email;
            $contact->contact_subject = $subject;
            $contact->contact_message = $message;

            $contact->save();
            // Mail::send('emails.message', ['contact' => $contact], function ($m) use ($contact) {
            //     $m->from($contact->contact_email, $contact->contact_name);

            //     $m->to('helpdesk@bios-it.co.id', '')->subject($contact->contact_subject);
            // });
            $view = \View::make('pages/home')->with('status', 'success');
            return "Yes";
        }

        $json_message = [
            'timestamp' => time(),
            'status' => 401,
            'error' => 'Uncomplete Filled',
            'message' => 'Confirmation failed',
            'path' => '/home'
        ];

        return response()->json($json_message, 401);
    }
}
