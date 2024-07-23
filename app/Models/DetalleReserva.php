<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleReserva extends Model
{
    use HasFactory;
    protected $table = 'detalle_reservas';
    protected $fillable = [
        'reserva_id',
        'numero_asiento',
        'ruta_id',
        'reserva_id',
    ];
    
    public function reserva()
    {
        return $this->belongsTo(Reservas::class);
    }

    public function ruta()
    {
        return $this->belongsTo(Rutas::class);
    }
}
