<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function customer()
    {
        return view('admin.customer.master');
    }
    public function index()
    {
        $items = Customer::latest()->paginate(10);
        return view('admin.customer.index',compact('items'));
    }

    public function create()
    {
        return view('admin.customer.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'link' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $item = new Customer();
        $item->title = $request->title;
        $item->link = $request->link;
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('app\images\customer'), $imageName);
            $item->image = $imageName;
        }
        $item->save();

        session()->flash('color', 'success');
        session()->flash('message', 'مشتری با موفقیت ثبت شد.');
        return redirect()->route('admin.customer.index');
    }

    public function edit($id)
    {
        $item = Customer::findOrFail($id);
        return view('admin.customer.edit',compact('item'));
    }

    public function update(Request $request , $id)
    {
        if($request->image == 'image') {
            $request->validate([
                'title' => 'required|string',
                'link' => 'required|string',
                'image' => 'mimes:jpeg,jpg,png,gif|required|max:1000',
            ]);
        } else {
            $request->validate([
                'title' => 'required|string',
                'link' => 'required|string',
            ]);
        }
        $item = Customer::findOrFail($id);
        $item->title = $request->title;
        $item->link = $request->link;
        if($request->hasFile('image')) {
            $image_path = public_path().'/app/images/customer/'.$item->image;
            unlink($image_path);
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('app\images\customer'), $imageName);
            $item->image = $imageName;
        }
        $item->save();
        session()->flash('color', 'success');
        session()->flash('message', 'مشتری با موفقیت ویرایش شد.');
        return redirect()->route('admin.customer.index');
    }

    public function delete($id , Request $request)
    {
        $item = Customer::findOrFail($id);
        $image_path = public_path().'/app/images/customer/'.$item->image;
        unlink($image_path);
        $item->delete();
        session()->flash('color', 'success');
        session()->flash('message', 'مشتری با موفقیت حذف شد.');
        return redirect()->route('admin.customer.index');
    }



}
