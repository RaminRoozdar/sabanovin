<?php

namespace App\Http\Controllers\Admin;

use App\Exports\LbsExport;
use App\Http\Controllers\Controller;
use App\Models\Lbs;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class LbsController extends Controller
{
    public function index()
    {

        return view('admin.lbs.index');
    }

    public function data()
    {
        $items= Lbs::select('*')->where('status','!=','nok')->get();
        return DataTables::of($items)
        ->addColumn('scenario', 'admin.lbs.scenario')
        ->addColumn('action', 'admin.lbs.action')
        ->addColumn('status', 'admin.lbs.status')
        ->make(true);
    }

    public function show($id)
    {
    //    $lbs = Lbs::find($id);
    //    $item = LocationLbs::with('location')->where('lbs_id' , $id)->select('*')->get()->toArray();
    $lbs_id= $id;
    return Excel::download(new LbsExport($lbs_id), 'lbs-collection.xlsx');

    }

    public function status($id)
    {
        $item = Lbs::find($id);
        $item->status = 'done';
        $item->save();
        session()->flash('color', 'success');
        session()->flash('message', 'وضعیت با موفقیت ویرایش شد.');
        return redirect()->route('admin.lbs');

    }

    public function location()
    {
        return view('admin.lbs.location');
    }

    public function locationData()
    {
        return DataTables::eloquent(Location::orderBy('created_at', 'desc')->select(['id','name']))
        ->addColumn('action', 'admin.lbs.action1')
        ->make(true);
    }

    public function store(Request $request)
    {
        $item = new Location();
        $item->name = $request->name;
        $item->save();
        session()->flash('color', 'success');
        session()->flash('message', 'مکان با موفقیت ایجاد شد.');
        return redirect()->route('admin.lbs.location');
    }


}
