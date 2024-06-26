<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iuran extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'iurans';

    public function bayar_iurans()
    {
        return $this->hasMany(BayarIuran::class,'id_iuran','id');
    }
}
