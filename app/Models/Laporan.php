<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $table = "Laporan";
    public $primaryKey = 'id';
    public $timestamps = false;
    public function Ruangan()
    {
        return $this->belongsTo(Ruangan::class,'id_ruang','id');
    }
    public function CS()
    {
        return $this->belongsTo(CS::class,'id_cs','id');
    }
    public function Bukti()
    {
        return $this->hasMany(Bukti::class,'id_laporan');
    }

    
}
