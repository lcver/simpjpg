<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posisi extends Model
{
    use HasFactory;
    protected $table = 'posisi';

    protected $primaryKey = 'posisi_id';
    protected $fillable = [
        'posisi',
    ];

    public function users()
    {
        return $this->hasOne(User::class);
    }
}
