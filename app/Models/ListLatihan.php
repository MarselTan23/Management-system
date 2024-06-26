<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListLatihan extends Model
{
    use HasFactory;
    protected $table = 'list_latihans';

    protected $fillable = ['tanggal', 'id_anggota'];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class,'id_anggota','id');
    }
}
