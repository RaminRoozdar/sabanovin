<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $items = Slider::latest()->paginate(5);
        return view('admin.slider.index',compact('items'));
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'link' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $item = new Slider();
        $item->title = $request->title;
        $item->link = $request->link;
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $imageName = $request->file('image')->store('public/slider');
            $item->image = $imageName;
        }
        $item->save();

        session()->flash('color', 'success');
        session()->flash('message', 'بازخورد با موفقیت ثبت شد.');
        return redirect()->route('admin.slider.index');
    }

    public function edit($id)
    {
        $item = Slider::findOrFail($id);
        return view('admin.slider.edit',compact('item'));
    }

    public function update(Request $request , $id)
    {
        if($request->image == 'image') {
            $request->validate([
                'title' => 'required|string',
                'link' => 'required|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        } else {
            $request->validate([
                'title' => 'required|string',
                'link' => 'required|string',
            ]);
        }
        $item = Slider::findOrFail($id);
        $item->title = $request->title;
        $item->link = $request->link;
        if($request->hasFile('image')) {
            Storage::delete($item->image);
           $imageName = time().'.'.$request->image->getClientOriginalExtension();
           $imageName = $request->file('image')->store('public/slider');
           $item->image = $imageName;
        }
        $item->save();
        session()->flash('color', 'success');
        session()->flash('message', 'بازخورد با موفقیت ویرایش شد.');
        return redirect()->route('admin.slider.index');
    }

    public function delete($id , Request $request)
    {
        $item = Slider::findOrFail($id);
        $image_path = public_path().'/app/images/slider/'.$item->image;
        unlink($image_path);
        $item->delete();
        session()->flash('color', 'success');
        session()->flash('message', 'بازخورد با موفقیت حذف شد.');
        return redirect()->route('admin.slider.index');
    }
}
