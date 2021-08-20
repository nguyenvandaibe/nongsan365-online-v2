<?php

namespace App\Actions;

use App\DTOs\StoreProductDTO;
use App\Models\Category;
use App\Models\Product;
use App\Shared\Utilities\MediaUploaderInterface;
use Illuminate\Support\Facades\Log;

//use Exception;

class ProductAction implements ProductActionInterface
{
    /**
     * @var MediaUploaderInterface
     */
    private $mediaUploader;

    public function __construct(MediaUploaderInterface $mediaUploader)
    {
        $this->mediaUploader = $mediaUploader;
    }

    /**
     * Lưu sản phẩm
     *
     * @param StoreProductDTO $storeProductDTO
     * @throws Exception
     */
    public function store(StoreProductDTO $storeProductDTO): void
    {
        try {
            $paths = array();

            if ($storeProductDTO->photos != null) {

                $paths = $this->mediaUploader->uploadMany($storeProductDTO->photos);
            }

            $category = Category::find($storeProductDTO->category_id);

            if ($category == null) {
                abort(400, __('resource.product.create.invalid'));
            }

            $product = Product::create([
                'name' => $storeProductDTO->name,
                'kind' => $storeProductDTO->kind,
                'description' => $storeProductDTO->description,
                'seed_date' => $storeProductDTO->seed_date,
                'harvest_date' => $storeProductDTO->harvest_date,
                'thumb' => $paths[0] ?? '',
                'type' => $category->type ?? 0,
                'category_id' => $storeProductDTO->category_id,
                'owner_id' => $storeProductDTO->owner->id,
            ]);

            if (!empty($paths)) {

                foreach ($paths as $path) {

                    $product->medias->create(['path' => $path]);
                }
            }
        } catch (\Throwable $th) {

            Log::error(get_class($this) . '|store|' . $th->getMessage());

            abort(500, );
        }
    }
}
