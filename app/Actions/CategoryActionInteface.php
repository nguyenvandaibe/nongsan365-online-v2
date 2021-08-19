<?php

namespace App\Actions;

use Illuminate\Database\Eloquent\Collection;

interface CategoryActionInteface
{
    public function index(array $conditions) : Collection;
}
