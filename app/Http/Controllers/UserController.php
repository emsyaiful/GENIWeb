<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Response;
use Hash;
use App\Http\Requests;
use App\Models\Userlist;
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
}
