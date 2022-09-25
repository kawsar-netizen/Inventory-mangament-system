<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductEntry extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'product_category_id',
        'item_category_id',
        'branch_id',
        'name',
        'type',
        'status',
        'brand_no',
        'model_no',
        'purchase_date',
        'tag_no',
        'user',
    ];
}
