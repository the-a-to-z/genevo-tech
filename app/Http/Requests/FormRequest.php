<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest
{

    public function messages()
    {
        return [
            'role_id.required' => 'Please choose role for the user.'
        ];
    }

}
