<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignOutController
{
    public function signOut(){

        session_start();
        session_destroy();
        session_abort();
        return redirect()->route('useraccount.signin');
    }
}
