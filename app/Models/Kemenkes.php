<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kemenkes extends Model
{
    use HasFactory;
    protected $table = 'kemenkes';
    protected $fillable = [
        'kemenkes',
    ];
}
