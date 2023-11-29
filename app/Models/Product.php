<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $fillable=
    [
        'product_name',
        'description',
        'amount',
        'product_type',
    ];

    use HasFactory;
}
