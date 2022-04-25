<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FeedbackController extends Controller
{
    public function index()
    {
        $items = Feedback::latest()->paginate(10);
        return view('admin.feedback.index',compact('items'));
    }

    public function create()
    {
        return view('admin.feedback.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'comment' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $item = new Feedback();
        $item->name = $request->name;
        $item->comment = $request->comment;
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $imageName = $request->file('image')->store('public/feedback');
            $item->image = $imageName;
        }
        $item->save();

        session()->flash('color', 'success');
        session()->flash('message', 'بازخورد با موفقیت ثبت شد.');
        return redirect()->route('admin.feedback.index');
    }

    public function edit($id)
    {
        $item = Feedback::findOrFail($id);
        return view('admin.feedback.edit',compact('item'));
    }

    public function update(Request $request , $id)
    {
        if($request->image == 'image') {
            $request->validate([
                'name' => 'required|string',
                'comment' => 'required|string',
                'image' => 'mimes:jpeg,jpg,png,gif|required|max:1000',
            ]);
        } else {
            $request->validate([
                'name' => 'required|string',
                'comment' => 'required|string',
            ]);
        }
        $item = Feedback::findOrFail($id);
        $item->name = $request->name;
        $item->comment = $request->comment;
        if($request->hasFile('image')) {
            Storage::delete($item->image);
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $imageName = $request->file('image')->store('public/customer');
            $item->image = $imageName;
            $item->save();
        }
        $item->save();
        session()->flash('color', 'success');
        session()->flash('message', 'بازخورد با موفقیت ویرایش شد.');
        return redirect()->route('admin.feedback.index');
    }

    public function delete($id , Request $request)
    {
        $item = Feedback::findOrFail($id);
        $image_path = public_path().'/app/images/feedback/'.$item->image;
        unlink($image_path);
        $item->delete();
        session()->flash('color', 'success');
        session()->flash('message', 'بازخورد با موفقیت حذف شد.');
        return redirect()->route('admin.feedback.index');
    }
}
