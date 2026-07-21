<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCancionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'titulo' => [
                'required',
                'string',
                'max:150',
            ],

            'artista' => [
                'required',
                'string',
                'max:150',
            ],

            'album' => [
                'nullable',
                'string',
                'max:150',
            ],

            'genero' => [
                'required',
                'string',
                'max:80',
            ],

            'compositor' => [
                'nullable',
                'string',
                'max:150',
            ],

            'sello_discografico' => [
                'nullable',
                'string',
                'max:150',
            ],

            'fecha_lanzamiento' => [
                'nullable',
                'date',
            ],

            'duracion_segundos' => [
                'required',
                'integer',
                'min:1',
                'max:7200',
            ],

            'numero_pista' => [
                'nullable',
                'integer',
                'min:1',
            ],

            'idioma' => [
                'required',
                'string',
                'max:50',
            ],

            'bpm' => [
                'nullable',
                'integer',
                'min:30',
                'max:300',
            ],

            'tonalidad' => [
                'nullable',
                'string',
                'max:30',
            ],

            'precio' => [
                'required',
                'numeric',
                'min:0',
            ],

            'calificacion' => [
                'nullable',
                'numeric',
                'between:0,5',
            ],

            'reproducciones' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'explicita' => [
                'required',
                'boolean',
            ],

            'disponible' => [
                'required',
                'boolean',
            ],
        ];
    }
}