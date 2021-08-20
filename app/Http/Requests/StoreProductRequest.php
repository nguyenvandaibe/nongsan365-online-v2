<?php

namespace App\Http\Requests;

use App\DTOs\StoreProductDTO;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'product_name' => 'required|string|max:255',
            'product_kind' => 'required|string|max:255',
            'product_description' => 'required',
            'product_seed_date' => 'required|date',
            'product_harvest_date' => 'required|date|after:product_seed_date',
            'product_category_id' => 'required|numeric',
            'product_photos' => 'nullable:image',
        ];
    }

    public function toDTO(): StoreProductDTO
    {
        $productName = $this->product_name;
        $productKind = $this->product_kind;
        $productDescription = $this->product_description;
        $productSeedDate = $this->product_seed_date;
        $productHarvestDate = $this->product_harvest_date;
        $productPhotos = $this->product_photos;
        $productCategoryId = $this->product_category_id;
        $productOwner = $this->user();

        return new StoreProductDTO([
            'name' => $productName,
            'kind' => $productKind,
            'description' => $productDescription,
            'seed_date' => $productSeedDate,
            'harvest_date' => $productHarvestDate,
            'photos' => $productPhotos,
            'category_id' => $productCategoryId,
            'owner' => $productOwner,
        ]);
    }
}
