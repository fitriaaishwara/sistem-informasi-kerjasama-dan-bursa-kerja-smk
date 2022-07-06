<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ViewDataLowongan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE view datalowongan as
              SELECT info_lowongans.id,instansis.nama,info_lowongans.judul,info_lowongans.isi,info_lowongans.foto, info_lowongans.status, info_lowongans.expired, info_lowongans.updated_at, info_lowongans.created_at
          	  FROM info_lowongans
              INNER JOIN instansis on instansis.id = info_lowongans.instansi_id');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement( 'DROP VIEW datalowongan');
    }
}
