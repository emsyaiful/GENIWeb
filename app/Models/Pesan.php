<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
	protected $table = 'gen_0103_contact';
    public $timestamps = false;
    protected $primaryKey = 'contact_id';
    protected $fillable = [
        'contact_name',
        'contact_email',
        'contact_subject',
        'contact_message',
        'contact_timecreated',
    ];
}
