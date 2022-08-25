<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateModule extends FormRequest
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
        $uuid = $this->module ?? '';
        return [
            'nome' => ['required', 'min:3', 'max:255', "unique:modules,nome,{$uuid},uuid"],
            'status' => ['nullable', 'boolean'],
            'id_mp' => ['nullable', 'integer', 'numeric']
        ];
    }
}
