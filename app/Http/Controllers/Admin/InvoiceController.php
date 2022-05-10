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

    public function data()
    {
        return DataTables::eloquent(Invoice::with('user')->orderBy('created_at', 'desc')->select(['id','user_id','created_at']))
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
            $total += $item->product->amount * $item->quantity;
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
