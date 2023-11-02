<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gedung extends Model
{
    use HasFactory;

    protected $table = 'gedung';
    protected $primaryKey = 'id';

    protected $fillable = [
        'area_id',
        'posisi_id',
        'gedung',
    ];
    public function area() {
        return $this->belongsTo(Area::class, 'area_id', 'id');
    }

    public function posisi() {
        return $this->belongsTo(Posisi::class, 'posisi_id', 'id');
    }
}
