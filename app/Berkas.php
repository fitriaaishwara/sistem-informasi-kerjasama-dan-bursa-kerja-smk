<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    protected $table = "berkas";
    protected $primaryKey = "id";
    protected $fillable = [
    	'judul','user_id','siswa_id','lowongan_id','cv','created_at',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function siswas()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function datalowongans()
    {
        return $this->belongsTo(datalowongan::class);
    }
}

