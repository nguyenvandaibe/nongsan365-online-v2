<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Growth extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'growth';

    protected $fillable = [
        'height',
        'weight',
        'step',
        'growth_level',
        'product_type',
        'product_id',
    ];
}
