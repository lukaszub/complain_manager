<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Mail\MailNotify;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{

    public function sendMail($form){

        Mail::to('jankowalski@gmail.com')->send(new MailNotify($form));

        return view('email.index');
    }
}
