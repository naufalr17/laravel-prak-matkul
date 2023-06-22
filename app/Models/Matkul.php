<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    protected $fillable = [
        'matakuliah', 
        'jadwal'
    ];
    use HasFactory;
}
