<?php

namespace App\Actions;

use App\DTOs\StoreProductDTO;

interface ProductActionInterface
{
    /**
     * Lưu sản phẩm
     *
     * @param StoreProductDTO $storeProductDTO
     */
    public function store(StoreProductDTO $storeProductDTO): void;
}
