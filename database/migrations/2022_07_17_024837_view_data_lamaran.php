<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ViewDataLamaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         DB::statement('CREATE view datalamaran as
            SELECT berkas.id,berkas.user_id,datasiswa.name,datasiswa.email,datasiswa.telp,berkas.lowongan_id,datalowongan.judul,datalowongan.nama,berkas.dokumen,berkas.status,berkas.created_at
            FROM berkas
            INNER JOIN datalowongan on datalowongan.id = berkas.lowongan_id
            INNER JOIN datasiswa on datasiswa.user_id = berkas.user_id');
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
