<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeJamKeluarMasukColumnTypeInLogVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('log_visitors', function (Blueprint $table) {
            $table->time('jam_masuk')->change();
            $table->time('jam_keluar')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('log_visitors', function (Blueprint $table) {
            //
        });
    }
}
