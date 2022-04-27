<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PageController extends Controller
{
    public function index()
    {
        return view('admin.page.index');
    }

    public function data()
    {
        return DataTables::eloquent(Page::select(['id','title'])->orderBy('created_at', 'desc'))
            ->addColumn('action', 'admin.page.action')
            ->make(true);
    }

    public function create()
    {
        return view('admin.page.create');
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);
        return view('admin.page.edit',compact('page'));
    }

    public function insert(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'text' => 'required|string',
            'access' => 'required',

        ]);
        $page = new Page();
        $page->title = $request->title;
        $page->description = $request->description;
        $page->slug = $request->slug;
        $page->text = $request->text;
        $page->access = $request->access;
        $page->save();
        session()->flash('color', 'success');
        session()->flash('message', 'صفحه با موفقیت ایجاد شد.');
        return view('admin.page.index');
    }

    public function update($id, Request $request)
    {
        $page = Page::findOrFail($id);
        $request->validate([
            'title' => 'required|string',
            'text' => 'required|string',
            'access' => 'required',

        ]);
        $page->title = $request->title;
        $page->description = $request->description;
        $page->text = $request->text;
        $page->access = $request->access;
        $page->slug = $request->slug;
        $page->save();
        session()->flash('color', 'success');
        session()->flash('message', 'صفحه با موفقیت ویرایش شد.');
        return view('admin.page.index',compact('page'));
    }

    public function delete($id, Request $request)
    {
        $page = Page::findOrFail($id);
        $page->delete();
        session()->flash('color', 'success');
        session()->flash('message', 'صفحه با موفقیت حذف شد.');
        return redirect()->route('admin.page');
    }
}
