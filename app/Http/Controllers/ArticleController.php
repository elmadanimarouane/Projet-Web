<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function create()
    {
        return view('articles.add');
    }

    public function store(Request $request)
    {
        $article = new article;
        $article->user_id = $request->user()->id;
        $article->content = $request->input('content');
        $article->firstteam = $request->input('firstteam');
        $article->secondteam = $request->input('secondteam');
        $article->dateofmatch = $request->input('dateofmatch');
        $article->timeofmatch = $request->input('timeofmatch');
        $article->odd = $request->input('odd');
        $article->verdict = $request->input('verdict');

        $article->save();
        return redirect('accueil');

    }
    public function index()
    {
        $articles = article::paginate(2);
        $links = $articles->render();
        return view('articles.liste')->with('articles', $articles)->with('links', $links);
    }

    public function destroy($id) {

        $article = Article::findOrFail($id);
        $article->delete();
        return redirect('accueil')->with('message', 'Article créé avec succès');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);

        return view('articles.edit',compact('article','id'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $article->content = $request->input('content');
        $article->firstteam = $request->input('firstteam');
        $article->secondteam = $request->input('secondteam');
        $article->dateofmatch = $request->input('dateofmatch');
        $article->timeofmatch = $request->input('timeofmatch');
        $article->odd = $request->input('odd');
        $article->verdict = $request->input('verdict');

        $article->update();
        return redirect()->route('accueil');

    }

}
