<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOfferRequest extends FormRequest
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
            'offer_type'    =>['required','in:product,shipping'],
            'describe'      =>['required','string'],
            'discount_type' =>['required','in:percentage,fixed'],
            'discount'      =>['required','numeric'],
            'offer'         =>['required'],
            'product_id'    =>['required_if:offer_type,=,product'],
        ];
    }
}
