<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CancionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'titulo' => $this->titulo,
            'artista' => $this->artista,
            'album' => $this->album,
            'genero' => $this->genero,
            'compositor' => $this->compositor,
            'sello_discografico' => $this->sello_discografico,
            'fecha_lanzamiento' =>
                $this->fecha_lanzamiento?->format('Y-m-d'),
            'duracion_segundos' => $this->duracion_segundos,
            'numero_pista' => $this->numero_pista,
            'idioma' => $this->idioma,
            'bpm' => $this->bpm,
            'tonalidad' => $this->tonalidad,
            'precio' => (float) $this->precio,
            'calificacion' => (float) $this->calificacion,
            'reproducciones' => $this->reproducciones,
            'explicita' => $this->explicita,
            'disponible' => $this->disponible,
            'created_at' => $this->created_at?->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at?->format('Y-m-d H:i:s'),
        ];
    }
}