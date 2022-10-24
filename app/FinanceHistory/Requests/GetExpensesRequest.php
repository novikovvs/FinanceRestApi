<?php

namespace App\FinanceHistory\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetExpensesRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'category' => 'string',
            'description' => 'string',
            'detail' => 'boolean|required',
            'start_period_date' => 'string',
            'end_period_date' => 'string',
        ];
    }

    public function failedValidation($validator)
    {
        if ($validator->fails()) {
            dd($validator->getMessageBag());
        }
    }
}
