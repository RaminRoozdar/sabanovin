<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Yajra\DataTables\Facades\DataTables;

class ArticleController extends Controller
{
    public function index()
    {

        return view('admin.article.index');
    }
    public function data()
    {
        return DataTables::eloquent(Article::with('category','user')->orderBy('created_at', 'desc')->select(['id','title','category_id','user_id']))
            ->addColumn('action', 'admin.article.action')
            ->make(true);
    }

    public function create()
    {
        $allTags= Tag::select('id' , 'name')
        ->get();
        $categories = Category::select('id' , 'title')
        ->where('type', '=', 2)
        ->get();
        return view('admin.article.create',compact('allTags','categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'text' => 'required|string',
            'category_id' => 'required',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $article = new Article();
        $article->title = $request->title;
        $article->description = $request->description;
        $article->text = $request->text;
        $article->slug = $request->slug;
        $article->category_id = $request->category_id;
        $article->comment_status = $request->comment_status;
        $article->user_id = Auth::user()->id;
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $imageName = $request->file('image')->store('public/article');
            $article->image = $imageName;
        }
        $article->save();
        if ($article && $article instanceof Article)
        {
            $tags = $request->input('postTags');
            foreach ($tags as $key=>$tag){
                if (intval($tag) == 0 ){
                    unset($tags[$key]);
                    $newTag = Tag::create(['name' => $tag]);
                    $tags[] = $newTag->id;
                }
            }
            $tags = array_map(function ($item){
                return intval($item);
            },$tags);
            $tags = array_unique($tags);
            $article->tags()->sync($tags);
        }

        session()->flash('color', 'success');
        session()->flash('message', 'مطلب با موفقیت ایجاد شد.');
        return redirect()->route('admin.article');
    }

    public function show($id)
    {
        $item = Article::findOrFail($id);
        return view('admin.article.show',compact('item'));
    }
    public function edit(Request $request , $id)
    {
        $allTags= Tag::select('id' , 'name')
        ->get();
        $categories = Category::select('id' , 'title')
        ->where('type', '=', 2)
        ->get();
        $item = Article::findOrFail($id);
        $postTags = $item->tags->pluck('id')->toArray();
        return view('admin.article.edit',compact('allTags' , 'categories','item','postTags'));
    }

   public function updateImage($id , Request $request)
   {
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    $item = Article::findOrFail($id);
    Storage::delete($item->image);
    $imageName = time().'.'.$request->image->getClientOriginalExtension();
    $imageName = $request->file('image')->store('public/article');
    $item->image = $imageName;
    $item->save();
    session()->flash('color', 'success');
    session()->flash('message', 'تصویر با موفقیت ویرایش شد.');
    return redirect()->back();

   }

    public function update(Request $request , $id)
    {
        $request->validate([
            'title' => 'required|string',
            'text' => 'required|string',
            'category_id' => 'required',
            'description' => 'required|string',
        ]);
        $article = Article::findOrFail($id);
        $article->title = $request->title;
        $article->description = $request->description;
        $article->text = $request->text;
        $article->slug = $request->slug;
        $article->category_id = $request->category_id;
        $article->comment_status = $request->comment_status;
        $article->user_id = Auth::user()->id;
        $article->save();
        $tags = $request->input('postTags');
        foreach ($tags as $key=>$tag){
            if (intval($tag) == 0 ){
                unset($tags[$key]);
                $newTag = Tag::create(['name' => $tag]);
                $tags[] = $newTag->id;
            }
        }
        $tags = array_map(function ($item){
            return intval($item);
        },$tags);
        $tags = array_unique($tags);
        $article->tags()->sync($tags);

        session()->flash('color', 'success');
        session()->flash('message', 'مطلب با موفقیت ویرایش شد.');
        return redirect()->route('admin.article');
    }
}
