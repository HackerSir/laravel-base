<?php

namespace App\Http\Requests;

use App\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoleRequest extends FormRequest
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
        /** @var Role $role */
        $role = $this->route('role');

        return [
            'name'         => [
                'required',
                Rule::unique('roles')->ignore(optional($role)->id),
            ],
            'display_name' => 'required',
            'permissions'  => 'array',
        ];
    }
}
