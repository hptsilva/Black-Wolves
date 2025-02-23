<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignOutController extends Controller
{
    public function signOut(){

        session_start();
        session_destroy();
        session_abort();
        return redirect()->route('signin');
    }
}
