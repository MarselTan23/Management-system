<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BayarIuran extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'bayar_iurans';

    public function anggota()
    {
        return $this->belongsTo(Anggota::class,'id_anggota','id');
    }
    public function iuran()
    {
        return $this->belongsTo(Iuran::class,'id_iuran','id');
    }
}
