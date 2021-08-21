<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductGrowthRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function storeGrowth(Product $product, StoreProductGrowthRequest $request)
    {
        dd($request->all());
        try {
            $product = $this->product->findOrFails($request->product_id);

            $product->growth()->createOrUpdate($request->all());

            return true;

        } catch (\Exception $e) {

            Log::error($e->getMessage());

            return false;
        }
    }
}
