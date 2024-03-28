<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateSupportRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'subject' => ['required', 'min:3', 'max:255', 'unique:supports'],
            'body' => ['required', 'min:3', 'max:10000']
        ];

        if ($this->method() === 'PUT') {
            $rules = [
                //"unique:supports,subject,{$this->id},id"
                'subject' => ['required', 'min:3', 'max:255', "unique:supports,subject,{$this->id},id"],
                'body' => ['required', 'min:3', 'max:10000'],
                // Rule::unique('supports')->ignore($this->id),
            ];
    
        }

        return $rules;
    }
}
