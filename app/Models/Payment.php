<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'gen_0102_payment';
    public $timestamps = false;
    protected $primaryKey = 'payment_id';
    protected $fillable = [
        'payment_username',
        'payment_email',
        'payment_bank',
        'payment_description',
        'payment_isconfirmed',
        'payment_payslip',
        'payment_timecreated',
    ];
}
