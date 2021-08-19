<?php

namespace App\Actions;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryAction implements CategoryActionInteface
{

    public function index(array $conditions) : Collection
    {
        return Category::where($conditions)->get();
    }
}
