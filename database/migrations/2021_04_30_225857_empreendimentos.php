<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Empreendimentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empreendimentos', function (Blueprint $table) {
            $table->id();
            $table->string('post_id')->nullable();
            $table->string('local_1')->nullable();
            $table->string('local_2')->nullable();
            $table->string('titulo')->nullable();
            $table->string('nome')->nullable();
            $table->string('nome_formatado')->nullable();
            $table->longText('desc')->nullable();
            $table->string('foto')->nullable();
            $table->string('slug')->nullable();
            $table->string('data')->nullable();
            $table->string('categoria')->nullable();
            $table->string('link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
