<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        /** @var User $user */
        $user = $this->route('user');

        $rules = [
            'name'         => 'required|max:255',
            'new_password' => 'nullable|string|min:8|confirmed',
        ];

        if (!$user) {
            $rules = array_merge([
                'email'        => 'required|unique:users,email',
                'new_password' => 'required|string|min:8|confirmed',
            ]);
        }

        return $rules;
    }
}
