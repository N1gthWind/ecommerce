<?php

namespace App\Http\Requests\Admin\Order;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderFilterRequest extends FormRequest
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
            'search' => ['string', 'nullable'],
            'status' => ['string', Rule::in(['0', '1', 'All'])],
            'date_from' => ['date', 'nullable'],
            'date_to' => ['date', 'nullable'],
        ];
    }
}
