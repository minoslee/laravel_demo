<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $table = 'articles';

    public function hasManyComments()
    {
        return $this->hasMany('App\Comment','article_id','id');
    }
}
