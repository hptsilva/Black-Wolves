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
        Schema::create('fotos_perfils', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('nome_arquivo', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fotos_perfils');
    }
};
