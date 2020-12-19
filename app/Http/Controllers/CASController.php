<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;


class CASController extends Controller
{

    public function checkAuthentification(){
        if(cas()->checkAuthentication()) {
            return response(true, 200);
        } else {
            return response(true, 200);
        }
    }

    public function authenticate () {
        cas()->authenticate();
        return view("login");
    }
}
