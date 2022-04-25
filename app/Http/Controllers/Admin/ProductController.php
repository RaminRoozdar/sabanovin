<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function index()
    {
        $items = DB::table('products')->where('status', '1')->paginate(10);
        return view('admin.product.index',compact('items'));
    }

    public function create()
    {
        $allTags= Tag::select('id' , 'name')
        ->get();
        return view('admin.product.create',compact('allTags'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->count = $request->count;
        $product->amount = replaceDecimalDot($request->amount);
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $imageName = $request->file('image')->store('public/product');
            $product->image = $imageName;
        }
        $product->save();
        if ($product && $product instanceof Product)
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
            $product->tags()->sync($tags);
        }

        session()->flash('color', 'success');
        session()->flash('message', 'محصول با موفقیت ایجاد شد.');
        return redirect()->route('admin.product.index');
    }

    public function disable($id)
    {
        $product = Product::findOrFail($id);
        $product->status = 0;
        $product->save();
        session()->flash('color', 'success');
        session()->flash('message', 'محصول با موفقیت غیرفعال شد.');
        return redirect()->route('admin.product.index');
    }

    public function edit($id)
    {

        $allTags= Tag::select('id' , 'name')
        ->get();
        $product = Product::findOrFail($id);
        $postTags = $product->tags->pluck('id')->toArray();
        return view('admin.product.edit',compact('product','allTags','postTags'));
    }

    public function update(Request $request , $id)
    {
        if($request->image == 'image') {
            $request->validate([
                'title' => 'required|string',
                'description' => 'required|string',
                'image' => 'mimes:jpeg,jpg,png,gif|required|max:1000',
            ]);
        } else {
            $request->validate([
                'title' => 'required|string',
                'description' => 'required|string',
            ]);
        }
        $product = Product::findOrFail($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->count = $request->count;
        $product->amount = replaceDecimalDot($request->amount);
        if($request->hasFile('image')) {
            Storage::delete($product->image);
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $imageName = $request->file('image')->store('public/product');
            $product->image = $imageName;
            $product->save();
        }
        $product->save();
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
        $product->tags()->sync($tags);
        session()->flash('color', 'success');
        session()->flash('message', ' محصول با موفقیت ویرایش شد.');
        return redirect()->route('admin.product.index');
    }

}
