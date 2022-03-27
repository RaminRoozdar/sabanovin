<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index($id , $slug)
    {
        $item =  Item::findOrFail($id);
        $tags = $item->tags()->get();
        // $comments = $article->comments()->with('user')->where('status' , 1)->get();
        return view('frontend.item.view',compact('item','tags'));
    }
}
