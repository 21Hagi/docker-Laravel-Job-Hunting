<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'email' => ['nullable', 'email'],
            'num_of_hires' => ['nullable', 'integer', 'min:0'],
            'turnover_rate' => ['nullable', 'numeric', 'min:0', 'max:100'],
            'paid_holidays_rate' => ['nullable', 'numeric', 'min:0', 'max:100'],
            'annual_income' => ['nullable', 'integer', 'min:0'],
            'work_overtime' => ['nullable', 'numeric', 'min:0'],
            'starting_salary' => ['nullable', 'integer', 'min:0'],
            'week_off' => ['nullable', 'string'],
            'url' => ['nullable', 'url'],
            'memo' => ['nullable', 'string', 'max:1000'],
        ];
    }

    public function companyAttributes()
    {
        return $this->only([
            'name',
            'email',
            'num_of_hires',
            'turnover_rate',
            'paid_holidays_rate',
            'annual_income',
            'work_overtime',
            'starting_salary',
            'week_off',
            'url',
            'memo',
        ]);
    }
}
