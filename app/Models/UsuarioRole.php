<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioRole extends Model
{
    use HasFactory;
    protected $table = 'usuario_roles';
    protected $fillable = [
        'user_id',
        'rol_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function role()
    {
        return $this->belongsTo(Role::class,'rol_id');
    }
}
