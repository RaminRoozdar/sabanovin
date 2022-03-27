<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with(['user','category'])->orderBy('created_at', 'desc')->paginate(5);
        $categories = Category::select(['title','id'])->where('type', '=', 2)->orderBy('created_at', 'desc')->get();
        $tags = Tag::inRandomOrder()->limit(10)->get();
        return view('frontend.article.index',compact('articles','categories','tags'));
    }

    public function article($id , $slug)
    {
        $article =  Article::findOrFail($id);
        $tags = $article->tags()->get();
        // $comments = $article->comments()->with('user')->where('status' , 1)->get();
        return view('frontend.article.view',compact('article','tags'));
    }

    public function tags($id)
    {
        $article =  Article::findOrFail($id);
        $tags = $article->tags()->get();
        return response()->json($tags);
    }
}
