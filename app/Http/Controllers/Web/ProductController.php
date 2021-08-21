<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOrUpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    private $product;

    public function __construct(Product $product)
    {
        $this->middleware(['auth']);

        $this->product = $product;
    }

    public function index(Request $request)
    {
        $products = $this->product->where($request->all())->get();

        return view('seller.product.index', compact('products'));
    }

    public function create()
    {
        return view('seller.product.create');
    }

    public function store(CreateOrUpdateProductRequest $request)
    {
        try {
            $product = Auth::user()->products()->create([
                'name' => $request->product_name,
                'kind'=>$request->product_kind,
                'plant_date'=>$request->product_plant_date,
                'harvest_date'=>$request->product_harvest_date,
                'crop'=>$request->product_crop,
            ]);

            session()->flash('success', 'Nông sản đã được lưu !');

            return redirect()->route('seller.products.index');

        } catch (\Exception $e) {

            session()->flash('danger', 'Hệ thống đã xảy ra lỗi.');

            Log::error($e->getMessage());

            return back()->withInput();
        }
    }

    public function show(Product $product)
    {
        return view('seller.product.show', compact('product'));
    }
}
