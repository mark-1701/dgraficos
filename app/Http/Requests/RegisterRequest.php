<?php

namespace App\Http\Requests;

use App\Rules\UniqueOrSoftDeletedRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => [
                'required',
                'min:3',
                new UniqueOrSoftDeletedRule,
            ],
            'email' => [
                'required',
                'email',
                new UniqueOrSoftDeletedRule,
            ],
            'password' => 'required|min:5|confirmed',
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'phone_number' => 'required|min:8|integer',
            'address' => 'min:1||integer',
            'date_of_birth' => 'required|date',
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}

