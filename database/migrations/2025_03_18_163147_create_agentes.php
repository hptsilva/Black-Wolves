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
        Schema::create('agentes', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->enum('admin', ['0', '1'])->default('0');
            $table->string('username', 255)->unique();
            $table->string('nome_agente', 255);
            $table->string('password', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('agentes');
    }
};
