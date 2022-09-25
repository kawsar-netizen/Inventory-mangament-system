<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCagegory extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'item_category_id',
        'name',
        'type',
        'valuation',
    ];
}
