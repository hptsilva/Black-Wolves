<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Screenshots;

class PaginaPrincipalController extends Controller
{
    public function index(){

        $screenshots = new Screenshots();
        $capturas = $screenshots->orderByRaw('created_at')->take(6)->get();
        return view('site.index', ['capturas' => $capturas]);

    }
}
