<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bukti extends Model
{
    use HasFactory;
    protected $table = "bukti";
    public $primaryKey = 'id';
    public $timestamps = false;
    public function Laporan()
    {
        return $this->belongsTo(Laporan::class,'id_laporan','id');
    }
    
    public function getType($filename){
        return pathinfo(storage_path("/bukti/" . $filename), PATHINFO_EXTENSION);
    }
}
