<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TestMailController extends Controller
{
    public function SendMail(Request $request) {
        Mail::to('test@chezmoi.fr')->send(new Contact($request->all()));
    }
}
