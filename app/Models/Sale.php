<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{


    public function saledetails()
    {
        return $this->hasMany(Saledetail::class,  'sales_id');
    }

    public function profits()
    {
        return $this->hasMany(ProfitAndExpense::class, 'sales_id');
    }
    public $fillable =
    [
        'total_amount',
        'expenditure',
        'profit',
        'date',

    ];
    use HasFactory;
}
