<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Demo extends Model
{
	protected $connection = 'mysql2';
    protected $table = 'demo_email';
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'email',
        'ip',
        'timecreated',
    ];
}
