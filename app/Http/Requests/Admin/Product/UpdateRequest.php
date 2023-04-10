<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'category_id' => 'required',
            'name' => 'required|unique:products,name',
            'price' => 'required|numeric|gt:10000',
            'intro' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'category_id.required' => 'Vui long chon the loai san pham',
            'name.required' => 'Vui long nhap ten san pham',
            'name.unique' => 'San pham nay da ton tai roi',
            'price.required' => 'Vui long nhap gia san pham',
            'price.numeric' => 'Gia san pham phai la so',
            'price.gt' => 'Gia san pham phai lon hon 10.000 VND',
            'intro.required' => 'Vui long nhap mo ta san pham',
        ];
    }
}
