<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controllers\Middleware;

class ArticleController extends Controller
{
    
    public function __construct()
    {
        // Middleware'larni aniqlash
        $this->middleware('permission:view articles')->only(['index']);
        $this->middleware('permission:edit articles')->only(['edit']);
        $this->middleware('permission:create articles')->only(['create']);
        $this->middleware('permission:delete articles')->only(['destroy']);
    }


    public function index()
    {
        $articles = Article::latest()->paginate(10);
        return view('articles.list', [
            "articles"=>$articles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'=>'required|min:5'
        ]);

        if ($validator -> passes()){

            $article = new Article();
            $article->title = $request->title;
            $article->text = $request->text;
            $article->author = $request->author;

            $article->save();
            return redirect()->route('articles.index')->with('success', 'Article create successfully!');

        } else {
            return redirect() -> route('articles.create')->withInput()->withErrors($validator);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit', [
            'article'=>$article
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $article = Article::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title'=>'required|min:5'
        ]);

        if ($validator -> passes()){

            $article->title = $request->title;
            $article->text = $request->text;
            $article->author = $request->author;
            $article->save();

            return redirect()->route('articles.index')->with('success', 'Article create successfully!');

        } else {
            return redirect() -> route('articles.create', $id)->withInput()->withErrors($validator);
        }
    }

    public function destroy($id){

        $article = Article::find($id);

        if ($article){
            $article -> delete();
            return redirect()->route('articles.index')->with('success','Article delete successfully');
        }
        return redirect()-> route('articles.index')->with('error', 'Does not found');

    }
}

