<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->string('nome');
            $table->string('module')->nullable();
            $table->string('submodule')->nullable();
            $table->string('tipo')->nullable();
            $table->boolean('destaque')->default(false);
            $table->boolean('especializacao')->default(false);
            $table->integer('id_mp')->nullable();
            $table->string('usuario_modificado')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
