<?php

namespace App\Http\Controllers;


use App\Models\Screenshots;
use App\Models\Videos;
use Illuminate\Http\Request;

class MediaPageController extends Controller
{
    public function mediaPageScreenshot(Request $request){

        $screenshots = new Screenshots();
        $capturas = $screenshots->orderByRaw('created_at')->paginate(12);
        return view('site.media_page.media_screenshot', ['capturas' => $capturas]);

    }

    public function mediaPageVideos(){

        $videos = new Videos();
        $videos = $videos->orderByRaw('created_at')->paginate(10);
        return view('site.media_page.media_videos', ['videos' => $videos]);

    }

}