<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    //model untuk user
    protected $fillable = array('user_id', 'user_name', 'user_email', 'user_company', 'user_typecompany', 'user_addresscompany', 'user_timecreated', 'user_isactive');
