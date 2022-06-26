<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UploadImage;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UploadImageController extends Controller
{
    public function index()
    {
        return view('admin.uploader.index');
    }

    public function image()
    {
        return view('admin.uploader.image');
    }

    public function data()
    {
        $items= UploadImage::select('*')->where('type','image')->orderBy('created_at', 'desc')->get();
        return DataTables::of($items)
        ->addColumn('link', 'admin.uploader.link')
        ->make(true);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'source' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3000',
        ]);
        $item = new UploadImage();
        $item->title = $request->title;
        $item->type = 'image';
        if ($request->hasFile('source')) {
            $imageName = time().'.'.$request->source->getClientOriginalExtension();
            $imageName = $request->file('source')->store('public/uploader');
            $item->source = $imageName;
        }
        $item->save();
        session()->flash('color', 'success');
        session()->flash('message', 'تصویر با موفقیت آپلود شد.');
        return redirect()->route('admin.uploader.image');

    }

    public function file()
    {
        return view('admin.uploader.file');
    }

    public function fileData()
    {
        $items= UploadImage::select('*')->where('type','file')->orderBy('created_at', 'desc')->get();
        return DataTables::of($items)
        ->addColumn('link', 'admin.uploader.link')
        ->make(true);
    }
    public function fileStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'source' => 'required|file|mimes:zip,rar,ppt,pptx,doc,docx,pdf,xls,xlsx|max:10000',
        ]);
        $item = new UploadImage();
        $item->title = $request->title;
        $item->type = 'file';
        if ($request->hasFile('source')) {
            $imageName = time().'.'.$request->source->getClientOriginalName();
            $imageName = $request->file('source')->store('public/uploader');
            $item->source = $imageName;
        }
        $item->save();
        session()->flash('color', 'success');
        session()->flash('message', 'فایل با موفقیت آپلود شد.');
        return redirect()->route('admin.uploader.file');
    }
}
