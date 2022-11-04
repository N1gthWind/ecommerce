<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ShopFilterRequest extends FormRequest
{

    /**
     * The URI that users should be redirected to if validation fails.
     *
     * @var string
     */
    protected $redirect = '/shop';

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
            'items' => ['string', Rule::in(['20', '40', '60'])],
            'sort_by' => ['string', Rule::in(['Newest', 'Oldest', 'Price: High to Low', 'Price: Low to High' ])],
            'category' => ['exists:categories,id'],
            ''
        ];
    }
}
