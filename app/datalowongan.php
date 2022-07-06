<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class datalowongan extends Model
{
    protected $table = 'datalowongan';
    protected $primaryKey = "id";

    public function berkaslowongan()
    {
        return $this->hasMany(Berkas::class);
    }
}
