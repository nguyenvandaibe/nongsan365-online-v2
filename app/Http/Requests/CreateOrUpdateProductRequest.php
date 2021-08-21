<?php

namespace App\Http\Requests;

use App\Shared\Consts\ProductConst;
use Illuminate\Foundation\Http\FormRequest;

class CreateOrUpdateProductRequest extends FormRequest
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
        return [
            'product_type' => 'required|integer|in:' . ProductConst::TYPE_PLANT . ',' . ProductConst::TYPE_ANIMAL,
            'product_name' => 'required|string|max:255',
            'product_kind' => 'required|string|max:255',
            'product_start_date' => 'required|date',
            'product_finish_date' => 'required|date|after:product_start_date',
            'product_crop' => 'nullable|string|max:255',
        ];
    }
}
