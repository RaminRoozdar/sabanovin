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
    public function installments()
    {
        return view('frontend.home.installments');
    }

    public function computing(Request $request)
    {
        $cash_price = replaceDecimalDot($request->cash_price);
        $prepayment = replaceDecimalDot($request->prepayment);
        $count = $request->count;
        $left_over = $cash_price - $prepayment;
        $monthly_profit = ($prepayment * 0.04);
        $total = $left_over + ($monthly_profit * $count);
        $check_price = $total / $count;

        return view('frontend.home.computing' , compact('cash_price' , 'prepayment' , 'count' , 'left_over','monthly_profit','total','check_price'));
    }
}
