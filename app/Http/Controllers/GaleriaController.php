<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Screenshots;
use Illuminate\Support\Facades\URL;

class GaleriaController extends Controller
{
    public function fotos(Request $request){

        $previousUrl = URL::previous();
        $currentDomain = $request->getHost();
        if(parse_url($previousUrl, PHP_URL_HOST) == $currentDomain){
            $screenshots = new Screenshots();
            $capturas = $screenshots->orderByRaw('created_at')->skip(9)->take(12)->get();

            return response()->json([
                'mensagem' => $capturas,
            ], 200);
        } else {
            return response()->json([
                'status_code' => 403,
                'mensagem' => "Forbidden",
            ], 403);
        }

    }
}
