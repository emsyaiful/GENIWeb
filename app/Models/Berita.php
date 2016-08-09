<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'gen_0104_news';
    public $timestamps = false;
    protected $primaryKey = 'news_id';
    protected $fillable = [
        'news_title',
        'news_content',
        'news_image',
        'news_timecreated',
        'deleted_at',
    ];
}
