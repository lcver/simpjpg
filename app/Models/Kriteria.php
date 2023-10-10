<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;
    protected $table = 'kriteria';
    protected $primaryKey = 'id_kriteria';

    protected $fillable = [
        'posisi_id',
        'kriteria',
    ];

    public function posisi() {
        return $this->belongsTo(Posisi::class, 'posisi_id', 'id_posisi');
    }
}
