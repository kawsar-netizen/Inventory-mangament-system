<?php

namespace App\Models;

use App\Models\ProductCagegory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ItemCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'valuation',
        'status',
    ];
    public function ProductCategory()
    {
        return $this->hasMany(ProductCagegory::class);
    }

}
