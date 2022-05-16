<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('numero_documento', 10);
            $table->string('titulo', 40);
            $table->string('descricao', 255);
            $table->dateTime('data_criacao');
            $table->string('arquivo', 100);
            $table->unsignedBigInteger('tipo_documento_id');

            $table->foreign('tipo_documento_id')
                ->references('id')
                ->on('tipos_documento')
                ->onDelete('cascade');

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
        Schema::dropIfExists('documentos');
    }
}
