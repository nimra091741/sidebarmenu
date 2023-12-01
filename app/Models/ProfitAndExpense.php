<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfitAndExpense extends Model
{
    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function saledetail()
    {
        return $this->belongsTo(Saledetail::class);
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
