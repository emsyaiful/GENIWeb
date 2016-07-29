<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model {

    protected $table = 'gen_0103_contact';
    public $timestamps = false;
    protected $primaryKey = 'contact_id';
    protected $fillable = [
        'contact_id',
        'contact_name',
        'contact_email',
        'contact_subject',
        'contact_message',
        'contact_timecreated',
    ];
    protected $rules = [
        'contact_id' => '',
        'contact_name' => 'required',
        'contact_email' => 'required',
        'contact_subject' => 'required',
        'contact_message' => 'required',
    ];

}
