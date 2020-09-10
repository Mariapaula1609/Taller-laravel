<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docente', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->enum('tipo', ['planta', 'ocasional'])->default('ocasional');
            $table->unsignedBigInteger('institucion_id');
            $table->softDeletes();  
            $table->timestamps();

            $table->foreign('institucion_id')->references('id')
            ->on('institucion')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('docente');
    }
}
