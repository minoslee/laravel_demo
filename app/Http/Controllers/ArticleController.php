<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //show
    public function show($id)
    {
        return view('article/show')->withArticle(Article::with('hasManyComments')->find($id));

    }

    public function demo()
    {
        return view('article.demo');
    }
}
