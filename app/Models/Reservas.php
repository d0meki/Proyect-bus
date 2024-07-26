<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
    use HasFactory;
    protected $table = 'reservas';
    protected $fillable = [
        'fecha_reserva',
        'hora_reserva',
        'total',
        'user_id',
        'ruta_id',
        'estado',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function ruta()
    {
        return $this->belongsTo(Rutas::class, 'ruta_id');
    }

    public function detalleReserva()
    {
        return $this->hasMany(DetalleReserva::class, 'reserva_id');
    }
}
