<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autobus extends Model
{
    use HasFactory;
    protected $table = 'autobuses';
    protected $fillable = [
        'placa',
        'marca',
        'modelo',
        'color',
        'asientos',
        'estado',
        'imagen',
    ];
}
