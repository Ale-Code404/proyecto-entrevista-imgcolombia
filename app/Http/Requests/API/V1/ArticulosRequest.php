<?php

namespace App\Http\Requests\API\V1;

use Illuminate\Foundation\Http\FormRequest;

class ArticulosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nombre' => 'required|regex:/^[\pL\s\-]+$/u|max:60',
            'valor_venta' => 'required|numeric|gt:0|lte:99999999999999.99',
            'valor_costo' => 'required|numeric|gt:0|lte:99999999999999.99',
            'porcentaje_iva' => 'required|in:0.19,0.008'
        ];
    }

    public function attributes()
    {
        return [
            'nombre' => '(nombre)',
            'valor_venta' => '(valor o precio de venta)',
            'valor_costo' => '(valor o costo)',
            'porcentaje_iva' => '(porcentaje del iva)'
        ];
    }

    public function messages()
    {
        return [
            'nombre.regex' => 'El :attribute solo puede contener letras, espacios y números',
            'valor_venta.gt' => 'El :attribute debe ser mayor que cero',
            'valor_venta.lte' => 'El :attribute tiene un número muy grande y excede los limites',
            'valor_costo.gt' => 'El :attribute debe ser mayor que cero',
            'valor_costo.lte' => 'El :attribute tiene un número muy grande y excede los limites',
            'porcentaje_iva.in' => 'El :attribute solo puede contener valor del 19% y 8% porciento respectivamente',
        ];
    }
}
