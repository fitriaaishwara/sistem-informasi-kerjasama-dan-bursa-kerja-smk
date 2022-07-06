<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    protected $table = "instansis";
    protected $primaryKey = "id";
    protected $fillable = [
    	'nama','alamat','kota','telp'
    ];

    public function info_lowongans()
    {
        return $this->hasMany(InfoLowongan::class);
    }
}
