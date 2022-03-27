<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $items = Feedback::latest()->paginate(20);
        return view('frontend.feedback.index',compact('items'));
    }
}
