<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'gen_0101_user';
    protected $primaryKey = 'id';
    protected $fillable = [
        'password', 'user_email', 'user_name', 'user_company', 'user_typecompany', 'user_addresscompany', 'user_timecreated', 'user_tokenrest', 'user_isactive', 'user_isadmin', 'deleted_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $timestamps = false;
}
