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
        Schema::create('builds', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->string('code', 255);
            $table->char('fk_id_agente', 36);
            $table->string('nome_build', 255);
            $table->enum('classe', ['dps', 'tank', 'gadget', 'raid']);
            $table->timestamps();

            $table->foreign('fk_id_agente')->references('id')->on('agentes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('builds');
    }
};
