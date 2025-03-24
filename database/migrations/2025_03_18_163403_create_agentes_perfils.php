<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('agentes_perfils', function (Blueprint $table) {
            $table->id()->primary();
            $table->char('fk_id_agente', 36);
            $table->enum('patente', ['Recruta', 'Tenente', 'Subcomandante', 'Comandante'])->nullable();
            $table->date('membro_desde');
            $table->string('descricao', 550);
            $table->unsignedBigInteger('fk_foto_perfil');
            $table->timestamps();
            $table->foreign('fk_id_agente')->references('id')->on('agentes')->onDelete('cascade');
            $table->foreign('fk_foto_perfil')->references('id')->on('fotos_perfils')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('agentes_perfils');
    }
};
