<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Feedback;
use App\Models\Item;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $items = Item::orderBy('created_at', 'desc')->take(5)->get();
        $customers = Customer::orderBy('created_at', 'desc')->take(10)->get();
        $feedbacks = Feedback::orderBy('created_at', 'desc')->take(5)->get();
        $sliders = Slider::orderBy('created_at', 'desc')->take(5)->get();
        return view('frontend.home.index',compact('items','customers','feedbacks','sliders'));
    }
}
