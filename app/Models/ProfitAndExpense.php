<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfitAndExpense extends Model
{

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
