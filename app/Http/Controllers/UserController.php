<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Response;
use App\Http\Requests;
use App\Models\Userlist;

class UserController extends Controller
{
    public function getUser(){
    	$user = new Userlist;
    	$user->get();

    	return Response::json($user);
    }
}
