<?php

namespace App\FinanceAnalyzer\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Validator;
use function PHPUnit\Framework\throwException;

class GetExpensesRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'category' => 'string',
            'description' => 'string',
            'detail' => 'boolean|required'
        ];
    }

    public function failedValidation($validator)
    {
        if ($validator->fails()) {
            dd($validator->getMessageBag());
        }

    }
}
