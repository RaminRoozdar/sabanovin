<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoiceItems;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index()
    {
      return view('admin.user.index');
    }

    public function data()
    {
        return DataTables::eloquent(User::select(['id','name','email','mobile']))
            ->addColumn('action', 'admin.user.action')
            ->make(true);
    }

}
