<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawai';
    protected $primaryKey = 'id';

    protected $fillable = [
        'jabatan_id',
        'pegawai',
        'jabatan_id',
        'posisi_id',
        'gender',
        'address',
        'handphone',
    ];
    public function jabatan() {
        return $this->belongsTo(Jabatan::class, 'jabatan_id', 'id');
    }
}
