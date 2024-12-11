<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HabitacioneStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'tipo_habitacion' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'numero_habitacion' => 'required|integer|unique:habitaciones,numero_habitacion',
            'capacidad_maxima' => 'required|integer|min:1',
            'descripcion' => 'nullable|string',
            'img' => 'nullable|array',
            'img.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4048',
        ];
    }
}
