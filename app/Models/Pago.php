<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;
    protected $table = 'pagos';
    protected $fillable = [
        'fecha_pago',
        'hora_pago',
        'metodo_pago',
        'total',
        'reserva_id',
    ];

    public function reserva()
    {
        return $this->belongsTo(Reservas::class);
    }

    public function detallePagos()
    {
        return $this->hasMany(DetallePago::class);
    }
}
