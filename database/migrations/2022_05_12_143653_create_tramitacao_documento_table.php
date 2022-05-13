<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTramitacaoDocumentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tramitacao_documento', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('documento_id');
            $table->unsignedBigInteger('setor_envio_id');
            $table->timestamp('data_hora_envio')->nullable();
            $table->unsignedBigInteger('setor_recebe_id')->nullable();
            $table->timestamp('data_hora_recebe')->nullable();

            $table->foreign('setor_envio_id')
                ->references('id')
                ->on('setor')
                ->onDelete('cascade');

            $table->foreign('setor_recebe_id')
                ->references('id')
                ->on('setor')
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
        Schema::dropIfExists('tramitacao_documento');
    }
}
