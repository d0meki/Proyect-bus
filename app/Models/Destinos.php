<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinos extends Model
{
    use HasFactory;
    protected $table = 'destinos';
    protected $fillable = [
        'nombre',
        'estado',
        'imagen',
        'latitud',
        'longitud',
    ];
}
