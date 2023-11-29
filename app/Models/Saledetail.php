<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saledetail extends Model
{
    public $fillable=
    [
        'product_id',
        'sales_id',
        'product_price_with_profit',
        'product_quantity',
        'gross_price',

    ];
    use HasFactory;
}
