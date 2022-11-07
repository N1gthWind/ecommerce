<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminAddProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->role === 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => "required|string|min:4",
            "slug" => "required|string|string",
            "price" => ['required','regex:/^[0-9]+\.[0-9]{2}$/'],
            "discount_price" => ['regex:/^[0-9]+\.[0-9]{2}$/', 'lt:price', 'nullable'],
            "quantity" => 'required|integer',
            'description' => 'required|string|max:200',
            'status' => ['required', Rule::in([1, 0])],
            'trending' => ['required', Rule::in([1, 0])],
            'meta_title' => 'required|string',
            'category' => ['required', 'integer', 'exists:categories,id'],
            'brand' => ['required', 'integer', 'exists:brands,id'],
            'images' => ['array'],
            'images.*' => ['image', 'mimes:png,jpg', 'max:4096'],
        ];
    }

    public function messages() {

        $messages = [];

        foreach ($this->file('images') ?? [] as $key => $val) {

            $messages["images.$key"] = $val?->getClientOriginalName(). " is not a valid active url";
        }

        return $messages;

    }
}
