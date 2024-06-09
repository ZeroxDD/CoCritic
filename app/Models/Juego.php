<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juego extends Model
{
    use HasFactory;

    protected $table = 'juegos';

    protected $fillable = [
        'external_id',
        'titulo',
        'descripcion',
        'fecha_de_salida',
        'plataforma',
        'imagen',
        'caratula',
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
