<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listrik extends Model
{
    use HasFactory;
    protected $fillable =[
        'kode','gol','daya','tarif'
    ];
}
