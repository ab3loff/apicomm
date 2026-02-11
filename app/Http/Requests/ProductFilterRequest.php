<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFilterRequest extends FormRequest
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
            'q' => 'string|nullable',
            'category_id' => 'exists:categories,id',
            'in_stock' => 'in:true,false',
            'rating_from' => 'numeric|between:0,5',
            'price_from' => 'numeric',
            'price_to' => 'numeric',
            'sort' => 'string|in:price_asc,price_desc,rating_desc,newest',
        ];
    }
}
