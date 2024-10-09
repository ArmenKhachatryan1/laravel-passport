<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class GetClientRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|int',
        ];
    }
}
