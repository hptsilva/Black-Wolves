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
        Schema::create('videos', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->string('nome_arquivo', 255);
            $table->string('titulo', 255);
            $table->string('thumbnail', 255)->nullable();
            $table->char('fk_id_agente', 36);
            $table->timestamps();

            $table->foreign('fk_id_agente')->references('id')->on('agentes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('videos');
    }
};
