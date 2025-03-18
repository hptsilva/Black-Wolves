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
        Schema::create('token_autenticacoes', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('token_uuid', 36);
            $table->string('usuario', 255);
            $table->enum('usado', ['SIM', 'NÃO']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('token_autenticacoes');
    }
};
