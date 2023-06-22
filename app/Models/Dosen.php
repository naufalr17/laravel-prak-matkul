<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $fillable = [
        'nama', 
        'mata_kuliah',
        'dosen_image'
    ];
    use HasFactory;
}
