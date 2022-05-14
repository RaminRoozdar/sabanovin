<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoiceItems;
use Illuminate\Http\Request;
use PayPal\Api\InvoiceItem;
use Yajra\DataTables\Facades\DataTables;

class InvoiceController extends Controller
{
    public function index()
    {
        return view('admin.invoice.index');
    }
    public function pendding()
    {
        return view('admin.invoice.pendding');
    }
    public function penddingData()
    {
        return DataTables::eloquent(Invoice::with('user')->where('status' , 'pending')->orderBy('created_at', 'desc')->select(['id','user_id','created_at']))
        ->addColumn('action', 'admin.invoice.action')
        ->addColumn('title', 'admin.invoice.title')
        ->make(true);
    }

    public function paid()
    {
        return view('admin.invoice.paid');
    }
    public function paidData()
    {
        return DataTables::eloquent(Invoice::with('user')->where('status' , 'paid')->orderBy('created_at', 'desc')->select(['id','user_id','created_at']))
        ->addColumn('action', 'admin.invoice.action')
        ->addColumn('title', 'admin.invoice.title')
        ->make(true);
    }
    public function posted()
    {
        return view('admin.invoice.posted');
    }
    public function postedData()
    {
        return DataTables::eloquent(Invoice::with('user')->where('status' , 'posted')->orderBy('created_at', 'desc')->select(['id','user_id','created_at']))
        ->addColumn('action', 'admin.invoice.action')
        ->addColumn('title', 'admin.invoice.title')
        ->make(true);
    }
    public function show($id)
    {
        $total = 0 ;
        $invoice = Invoice::findOrFail($id);
        $items = InvoiceItems::with('product')->where('invoice_id', $id)->get();
        foreach($items as $item)
        {
            $total += $item->amount * $item->quantity;
        }
        return view('admin.invoice.show' , compact('items','invoice','total'));
    }

    public function update($id , Request $request)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->status = $request->status;
        $invoice->tracking_code = $request->tracking_code;
        $invoice->description = $request->description;
        $invoice->save();
        session()->flash('color', 'success');
        session()->flash('message', 'تغییرات با موفقیت انجام شد.');
        return redirect()->back();
    }
}
