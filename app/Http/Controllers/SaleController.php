<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\ProfitAndExpense;
use App\Models\Saledetail;
// use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class SaleController extends Controller
{

    public $profitandexpense=[], $saledetails=[], $profit, $saledetail, $id;
    public function pdfGenerate($id)
    {
        $sales = Sale::where('id', $id)->get();
            $data = ['sales' => $sales];
        $saledetails = Saledetail::from('saledetails as sd')
            ->where('sales_id', $id)
            ->leftjoin('products as p', 'p.id', 'sd.product_id')
            ->select('sd.*', 'p.product_name as product_name')
            ->get();

        // Initialize $saledetails as an empty array if it's empty
        $saledetails = $saledetails->isEmpty() ? [] : ['saledetail' => $saledetails];

        $profit = ProfitAndExpense::where('sales_id', $id)->get();
        // Initialize $profitandexpense as an empty array if it's empty
        $profitandexpense = $profit->isEmpty() ? [] : ['profit' => $profit];

        $pdf = PDF::loadView('pdf.sale', compact(['data', 'saledetails', 'profitandexpense']))
            ->setPaper('a4', 'portrait');

        return $pdf->stream('sale.pdf');
    }
}
 // public function pdfGenerate($id)
    // {
    //     $sales = Sale::where('id', $id)->get();
    //     $data = ['sales' => $sales];
    //     $saledetails = Saledetail::from('saledetails as sd')
    //         ->where('sales_id', $id)
    //         ->leftjoin('products as p', 'p.id', 'sd.product_id')
    //         ->select('sd.*', 'p.product_name as product_name')
    //         ->get();


    //     if ($saledetails->isNotEmpty()) {
    //         $saledetails = ['saledetail' => $saledetails];
    //     }
    //     $profit = ProfitAndExpense::where('sales_id', $id)->get();
    //     if ($profit->isNotEmpty()) {
    //         $profitandexpense = ['profit' => $profit];

    //     }
    //     $pdf = PDF::loadView('pdf.sale', compact(['data', 'saledetails', 'profitandexpense']))
    //         ->setPaper('a4', 'portrait');
    //     return $pdf->stream('sale.pdf');
    // }
