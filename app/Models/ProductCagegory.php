<?php

namespace App\Models;

use App\Models\ItemCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    public function ItemCategory()
    {
        return $this->belongsTo(ItemCategory::class,'item_category_id');
    }
}
