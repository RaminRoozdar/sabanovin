<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\MyTestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class MailController extends Controller
{
    public function sendEmail() {
        Mail::to('raminroozdar1996@gmail.com')->send(new MyTestMail('ramin' , 'roozdar'));

    }
}
