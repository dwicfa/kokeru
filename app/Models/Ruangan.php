<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;
    protected $table = "ruangan";
    public $primaryKey = 'id';
    public $timestamps = false;
    public function Laporan()
    {
        return $this->hasMany(Laporan::class,'id_ruang');
    }
}
