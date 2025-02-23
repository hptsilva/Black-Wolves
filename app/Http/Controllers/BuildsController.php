<?php

namespace App\Http\Controllers;

use App\Models\Builds;
use Exception;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Ods;

use function Laravel\Prompts\alert;

class BuildsController extends Controller
{
    public function ofensivo(){

        return view('site.builds.td2.ofensivo');

    }

    public function defensivo(){

        return view('site.builds.td2.defensivo');

    }

    public function utilitario(){

        return view('site.builds.td2.utilitario');

    }

    public function raid(){

        return view('site.builds.td2.invasao');

    }
}
