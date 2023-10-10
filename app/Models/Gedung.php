<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gedung extends Model
{
    use HasFactory;

    protected $table = 'gedung';
    protected $primaryKey = 'id_gedung';

    protected $fillable = [
        'area_id',
        'gedung',
    ];
    public function area() {
        return $this->belongsTo(Area::class, 'area_id', 'id_area');
    }
}
