<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    protected $table = "berkas";
    protected $primaryKey = "id";
    protected $fillable = [
        'user_id','lowongan_id','judul','dokumen','status','created_at',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function datalowongans()
    {
        return $this->belongsTo(datalowongan::class);
    }
    
}

