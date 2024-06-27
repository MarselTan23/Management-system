<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $table = 'anggota';
    //protected $fillable
    protected $guarded = ['id'];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class,'id_jurusan','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'id_user','id');
    }
public function bayar_iuran(){
    return $this->hasMany(BayarIuran::class,'id_anggota','id');
}
public function Listlatihan(){
    return $this->hasMany(ListLatihan::class,'id_anggota','id');
}

}
