<?php

namespace App\DTOs;

use Spatie\DataTransferObject\DataTransferObject;

class StoreProductDTO extends DataTransferObject
{
    public $name;

    public $kind;

    public $description;

    public $seed_date;

    public $harvest_date;

    public $photos;

    public $category_id;

    public $owner;
}
