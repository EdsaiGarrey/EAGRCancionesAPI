<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cancion extends Model
{
    use HasFactory;

    protected $table = 'canciones';

    protected $fillable = [
        'user_id',
        'titulo',
        'artista',
        'album',
        'genero',
        'compositor',
        'sello_discografico',
        'fecha_lanzamiento',
        'duracion_segundos',
        'numero_pista',
        'idioma',
        'bpm',
        'tonalidad',
        'precio',
        'calificacion',
        'reproducciones',
        'explicita',
        'disponible',
    ];

    protected function casts(): array
    {
        return [
            'fecha_lanzamiento' => 'date',
            'precio' => 'decimal:2',
            'calificacion' => 'decimal:1',
            'reproducciones' => 'integer',
            'explicita' => 'boolean',
            'disponible' => 'boolean',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}