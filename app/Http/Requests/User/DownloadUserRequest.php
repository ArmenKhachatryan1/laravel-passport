<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class DownloadUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'format' => 'required|string',
            'column' => 'required|array',
            'column.*' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ];
    }

    public function getFileFormat(): string
    {
        return $this->query('format');
    }
}
