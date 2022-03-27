<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }
    public function data()
    {

        $f= DB::table('categories')->get();
        foreach ($f as $f1){

            $f1->category_id=Category::where('id','=',$f1->category_id)->select('title')->get()->first()?Category::where('id','=',$f1->category_id)->select('title')->get()->first()['title']:'گروه اصلی';

        }
        return DataTables::collection($f)
            ->addColumn('type', 'admin.category.type')
            ->addColumn('status', 'admin.category.status')
            ->addColumn('action', 'admin.category.action')
            ->make(true);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function createId($id)
    {

        $category_id =$id;
        return view('admin.category.createId',compact('category_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'slug' => 'required|string',
        ]);
        $category = new Category();
        if($request->category_id == 0)
        {
            $category->category_id = 0;
        }else{
            $category->category_id = $request->category_id;
        }
        $category->title = $request->title;
        $category->slug = $request->slug;
        $category->link = $request->link;
        $category->type = $request->type;
        $category->save();
        session()->flash('color', 'success');
        session()->flash('message', ' دسته حدید با موفقیت ایجاد شد.');
        return redirect()->route('admin.category');
    }

    public function edit($id)
    {
        $item = Category::findOrFail($id);
        $categories = Category::where('category_id','==' , 0)->orderBy('created_at','desc')->get();
        return view('admin.category.edit',compact('item' , 'categories'));

    }

    public function update(Request $request , $id)
    {

            $request->validate([
                'title' => 'required|string',
                'slug' => 'required|string',

            ]);
            $category = Category::findOrFail($id);
            if($request->category_id == 0)
            {
                $category->category_id = 0;
            }else{
                $category->category_id = $request->category_id;
            }
            $category->title = $request->title;
            $category->slug = $request->slug;
            $category->link = $request->link;
            $category->type = $request->type;
            $category->save();
            session()->flash('color', 'success');
            session()->flash('message', ' دسته با موفقیت ویرایش شد.');
            return redirect()->route('admin.category');
        }


}
