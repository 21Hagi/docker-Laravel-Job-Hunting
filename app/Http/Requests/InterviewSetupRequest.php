<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InterviewSetupRequest extends FormRequest
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
            'voice_num' => ['integer', 'min:0'],
            'num_of_random_list' => ['integer', 'min:0'],
        ];
    }

    public function interviewSetupAttributes()
    {
        return $this->only([
            'voice_num',
            'num_of_random_list'
        ]);
    }
}