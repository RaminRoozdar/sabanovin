<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index($id)
    {
        $page = Page::find($id);
        if($page->access == 'private' && !Auth::check()) {
            return redirect()->guest('login');
        }
        return view('frontend.page.index',compact('page'));
    }

    public function slug($id,$slug)
    {
        $page = Page::find($id);
        if($page->access == 'private' && !Auth::check()) {
            return redirect()->guest('login');
        }
        return view('frontend.page.index',compact('page'));
    }

}
