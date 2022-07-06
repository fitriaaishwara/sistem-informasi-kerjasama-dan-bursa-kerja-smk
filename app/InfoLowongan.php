<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoLowongan extends Model
{   
    protected $table = "info_lowongans";
    protected $primaryKey = "id";
    protected $fillable = [
    	'judul','instansi_id','isi','foto','active','expired',
    ];

    public function instansis()
    {
        return $this->belongsTo(Instansi::class);
    }
}
