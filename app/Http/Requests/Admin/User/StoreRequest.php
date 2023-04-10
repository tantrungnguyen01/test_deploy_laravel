<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed'
        ];
    }

    public function messages (): array 
    {
        return [
            'email.required' => 'Vui long nhap du lieu email',
            'email.email' => 'Day khong phai la dinh dang email',
            'email.unique' => 'Email nay da ton tai roi',
            'password.required' => 'Vui long nhap mat khau',
            'password.min' => 'Mat khau cua ban it nhat phai co 8 ky tu',
            'password.confirmed' => 'Hai mat khau khong trung khop'
        ];
    }
}
