<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{


    public function saledetails()
    {
        return $this->hasMany(Saledetail::class);
    }

    public function profits()
    {
        return $this->hasMany(ProfitAndExpense::class);
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
