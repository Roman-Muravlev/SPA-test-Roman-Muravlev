<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'string|required',
            'email' => 'string|required',
            'url' => 'string|nullable',
            'text' => 'required',
            'file' => 'nullable',
            'parent_id' => 'integer|exist:comments,id|nullable',
        ];
    }
}
