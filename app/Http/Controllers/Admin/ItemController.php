<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ItemController extends Controller
{
    public function index()
    {

        return view('admin.item.index');
    }
    public function data()
    {
        return DataTables::eloquent(Item::orderBy('created_at', 'desc')->select(['id','title','slug']))
            ->addColumn('action', 'admin.item.action')
            ->make(true);
    }

    public function create()
    {
        $allTags= Tag::select('id' , 'name')
        ->get();
        return view('admin.item.create',compact('allTags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'slug' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $item = new Item();
        $item->title = $request->title;
        $item->description = $request->description;
        $item->slug = $request->slug;
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $imageName = $request->file('image')->store('public/item');
            $item->image = $imageName;
        }
        $item->save();
        if ($item && $item instanceof Item)
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
            $item->tags()->sync($tags);
        }
        session()->flash('color', 'success');
        session()->flash('message', ' خبرجدید با موفقیت ایجاد شد.');
        return redirect()->route('admin.item');

    }
    public function show($id)
    {
        $item = Item::findOrFail($id);
        return view('admin.item.show',compact('item'));
    }
    public function edit($id)
    {
        $allTags= Tag::select('id' , 'name')
        ->get();
        $item = Item::findOrFail($id);
        $postTags = $item->tags->pluck('id')->toArray();
        return view('admin.item.edit',compact('item','allTags','postTags'));
    }

    public function update(Request $request, $id)
    {
        if($request->image == 'image') {
            $request->validate([
                'title' => 'required',
                'slug' => 'required',
                'description' => 'required',
                'image' => 'mimes:jpeg,jpg,png,gif|required|max:1000',
            ]);
        } else {
            $request->validate([
                'title' => 'required',
                'slug' => 'required',
                'description' => 'required',
            ]);
        }
        $item = Item::findOrFail($id);
        $item->title = $request->title;
        $item->description = $request->description;
        $item->slug = $request->slug;
        if($request->hasFile('image')) {
            Storage::delete($item->image);
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $imageName = $request->file('image')->store('public/item');
            $item->image = $imageName;
            $item->save();
        }
        $item->save();
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
        $item->tags()->sync($tags);
        session()->flash('color', 'success');
        session()->flash('message', ' خبر با موفقیت ویرایش شد.');
        return redirect()->route('admin.item');
    }
    public function delete($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        session()->flash('color', 'success');
        session()->flash('message', ' خبر با موفقیت حذف شد.');
        return redirect()->route('admin.item');

    }

}
