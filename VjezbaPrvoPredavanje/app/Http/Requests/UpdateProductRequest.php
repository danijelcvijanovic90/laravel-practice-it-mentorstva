<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
        $product=$this->route('product'); //not sure how this works. Research.
        return [
            "name" => "string|required|unique:products,name," . $product->id, //ignore unique for this id
            "description" => "string|required|min:5|max:255",
            "amount" => "integer|min:1|required",
            "price" => "numeric|gt:0|required",
            "image" => "string|required"
        ];
    }
}
