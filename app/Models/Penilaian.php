<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;
    protected $table = 'penilaian';
    protected $primaryKey = 'id';

    protected $fillable = [
        'posisi_id',
        'pegawai_id',
        'area_id',
        'kartu_kuning'
    ];

    public function posisi()
    {
        return $this->belongsTo(Posisi::class, 'posisi_id');
    }
    
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }
}
