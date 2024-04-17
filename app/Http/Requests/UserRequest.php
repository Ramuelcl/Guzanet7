<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:3', 'max:64'],
            'email' => ['required', 'string', 'min:7', 'email', 'max:128'],
            // 'password' => ['required', Rules\Password::defaults()],
            //     'profile_photo_path' => ['file', 'nullable', 'max:256'],
            //     'is_active' => ['boolean'],
        ];
    }
}
