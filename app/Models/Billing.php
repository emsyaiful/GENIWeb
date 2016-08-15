<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    protected $table = 'gen_0301_billing';
    public $timestamps = false;
    protected $primaryKey = 'billing_id';
    protected $fillable = [
        'fk_user_id',
        'billing_data',
        'billing_duedate',
        'billing_activeperiod',
        'billing_status',
        'billing_isactive',
    ];
    public function user() {
    	return $this->hasOne('App\User', 'id', 'fk_user_id');
    }
}
