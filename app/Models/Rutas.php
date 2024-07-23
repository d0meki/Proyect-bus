<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rutas extends Model
{
    use HasFactory;
    protected $table = 'rutas';
    protected $fillable = [
        'fecha',
        'hora',
        'costo',
        'destino_id',
        'buses_id',
    ];

    public function destino()
    {
        return $this->belongsTo(Destinos::class, 'destino_id');
    }

    public function bus()
    {
        return $this->belongsTo(Autobus::class, 'buses_id');
    }
}
