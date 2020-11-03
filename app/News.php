<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "tbl_news";
    protected $primaryKey = 'news_id';
}
