<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Agentes;
use Illuminate\Http\Request;

class AdminController
{

    public function admin($name){

        if ($name != $_SESSION['nome']){
            return redirect()->route('admin.index', ['name' => $_SESSION['nome']]);
        }

        return view ('admin.admin');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agentes = DB::table('agentes')->select('id', 'nome_agente', 'created_at')->where('admin', '=', '0')->get();
        return response()->json([
            'sucesso' => true,
            'agentes' => $agentes,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $agente = Agentes::where('id', '=', $id)->get()->first();
        if (isset($agente)){

            $agente->password = "00000000";
            $agente->save();

            return response()->json([
                'sucesso' => true,
                'mensagem' => "Conta reseta com sucesso!",
            ], 200);
        } else {

            return response()->json([
                'sucesso' => false,
                'mensagem' => "Agente não encontrado!",
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $agente = Agentes::where('id', '=', $id)->delete();

        if($agente == 1) {
            return response()->json([
                'sucesso' => true,
                'mensagem' => "Conta excluída com sucesso!",
            ], 200);
        } else {
            return response()->json([
                'sucesso' => false,
                'mensagem' => "Conta não encontrada.",
            ], 404);
        }
    }
}
