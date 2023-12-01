<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saledetail extends Model
{

protected $fillable = [
    'product_id',
    'sales_id',
    'product_price_with_profit',
    'product_quantity',
    'gross_price',
];

public function sale()
{
    return $this->belongsTo(Sale::class);
}

public function profitandexpense()
{
    return $this->hasMany(ProfitAndExpense::class);
}
public function product()
{
    return $this->belongsTo(Product::class);
}
    use HasFactory;
}
