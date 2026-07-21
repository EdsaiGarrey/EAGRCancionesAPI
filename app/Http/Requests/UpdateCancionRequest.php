<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCancionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'titulo' => [
                'sometimes',
                'required',
                'string',
                'max:150',
            ],

            'artista' => [
                'sometimes',
                'required',
                'string',
                'max:150',
            ],

            'album' => [
                'sometimes',
                'nullable',
                'string',
                'max:150',
            ],

            'genero' => [
                'sometimes',
                'required',
                'string',
                'max:80',
            ],

            'compositor' => [
                'sometimes',
                'nullable',
                'string',
                'max:150',
            ],

            'sello_discografico' => [
                'sometimes',
                'nullable',
                'string',
                'max:150',
            ],

            'fecha_lanzamiento' => [
                'sometimes',
                'nullable',
                'date',
            ],

            'duracion_segundos' => [
                'sometimes',
                'required',
                'integer',
                'min:1',
                'max:7200',
            ],

            'numero_pista' => [
                'sometimes',
                'nullable',
                'integer',
                'min:1',
            ],

            'idioma' => [
                'sometimes',
                'required',
                'string',
                'max:50',
            ],

            'bpm' => [
                'sometimes',
                'nullable',
                'integer',
                'min:30',
                'max:300',
            ],

            'tonalidad' => [
                'sometimes',
                'nullable',
                'string',
                'max:30',
            ],

            'precio' => [
                'sometimes',
                'required',
                'numeric',
                'min:0',
            ],

            'calificacion' => [
                'sometimes',
                'nullable',
                'numeric',
                'between:0,5',
            ],

            'reproducciones' => [
                'sometimes',
                'nullable',
                'integer',
                'min:0',
            ],

            'explicita' => [
                'sometimes',
                'required',
                'boolean',
            ],

            'disponible' => [
                'sometimes',
                'required',
                'boolean',
            ],
        ];
    }
}