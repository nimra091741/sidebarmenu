<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfitAndExpense extends Model
{
    public function sale()
    {
        return $this->belongsTo(Sale::class, 'sales_id');
    }


    public function saledetail()
{
    return $this->belongsTo(Saledetail::class,  'sale_detail_id');
}
    public $fillable =
    [
        'sales_id',
        'sale_detail_id',
        'type',
        'description',
        'amount',
    ];
    use HasFactory;
}
