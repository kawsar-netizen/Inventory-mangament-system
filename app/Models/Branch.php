<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'br_name',
        'br_code',
        'location',
        'br_type',
        'status',
    ];
}
