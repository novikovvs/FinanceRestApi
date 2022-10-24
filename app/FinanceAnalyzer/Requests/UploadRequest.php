<?php

namespace App\FinanceHistory\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UploadRequest extends FormRequest
{
    public function rules()
    {
        return [
            'upload_file' => [
                'required',
                'file',
                'mimes:csv,txt'
            ],
        ];
    }
}
