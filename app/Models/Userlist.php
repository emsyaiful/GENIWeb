<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Userlist extends Model
{
	protected $table = 'gen_0101_user';
	protected $primaryKey = 'user_id';
	public $incrementing = true;
    protected $fillable = array('user_id', 'user_name', 'user_email','user_company', 'user_typecompany' ,'user_addresscompany', 'user_timecreated', 'user_isactive');
}
