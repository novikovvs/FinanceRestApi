<?php

namespace App\FinanceHistory\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadRequest extends FormRequest
{
    public function rules()
    {
        return [
            'upload_file' => [
                'required',
                'file',
                'mimes:csv,txt',
            ],
        ];
    }
}
