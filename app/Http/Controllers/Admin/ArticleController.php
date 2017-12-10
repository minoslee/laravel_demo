<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ArticleController extends Controller
{
    //主页
    public function index()
    {
        return view('admin.article.index')->with('articles',Article::paginate(10));
    }

    //新增文章get
    public function create()
    {
        return view('admin/article/create');
    }
    
    //新增文章post
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:articles|max:255',
            'body' => 'required|max:20000',
        ]);

        $article = new Article;
        $article->title = $request->get('title');
        $article->body = $request->get('body');
        $article->user_id = $request->user()->id;

        if ($article->save()) {
            return redirect('admin/articles');
        } else {
            return redirect()->back()->withInput()->withErrors('保存失败！');
        }
    }

    //编辑
    public function edit($id)
    {
        return view('admin.article.edit')->with('article',Article::find($id));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|unique:articles,title,'.$id.'|max:255',
            'body' => 'required',
        ]);
        $article = Article::find($id);
        $article->title = $request->get('title');
        $article->body = $request->get('body');
        if($article->save())
        {
            return redirect('admin/articles');
        }
        else
            return redirect()->back()->withInput()->withErrors('更新失败');

    }
    //destroy
    public function destroy($id)
    {
        Article::find($id)->delete();
        return redirect()->back()->withInput()->withErrors('删除成功！');
    }
}
