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
        Schema::create('comentarios', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('fk_id_video', 36);
            $table->char('fk_id_agente', 36);
            $table->string('comentario', 1000);
            $table->timestamps();

            $table->foreign('fk_id_video')->references('id')->on('videos')->onDelete('cascade');
            $table->foreign('fk_id_agente')->references('id')->on('agentes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('comentarios');
    }
};
