<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSituacaoTramitacaoDocumentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tramitacao_documento', function (Blueprint $table) {
            $table->enum('situacao', ['', 'recebido', 'pendente'])->after('data_hora_recebe');
        });
    }

    /*
     * recebido
     * pendente
     * */
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tramitacao_documento', function (Blueprint $table) {
            $table->dropColumn('situacao');
        });
    }
}
