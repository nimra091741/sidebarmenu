<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Sale;
use App\Models\Saledetail;
use App\Models\ProfitAndExpense;
use Livewire\Component;
use Ramsey\Uuid\Type\Decimal;

class Createsale extends Component
{
    public $product, $date, $profit, $expenditure, $error_message = "You are entering something wrong.";
    public $sale_products = [], $product_id,  $product_price_with_profit, $product_quantity, $gross_price;
    public $profitRows = [], $type, $description, $amount;
    public $profitAndExpense,  $total_amount, $sales, $sales_id, $sale_detail_id;
    public $products = [], $product_name;
    public $search_modal = false;
    public function openModal()
    {
        $this->search_modal = true;
    }
    public function back()
    {
        $this->products = [];
        $this->reset(['product_name']);
        $this->search_modal = false;
    }
    public function mount()
    {
        $this->addEmptyRow();
        $this->date = now()->format('Y-m-d');
    }
    public function updated($key)
    {
        try {
            $explode = explode('.', $key);
            if (
                count($explode) === 3 &&
                isset(
                    $this->sale_products[$explode[1]],
                    $this->sale_products[$explode[1]]['product_price_with_profit'],
                    $this->sale_products[$explode[1]]['product_quantity']
                )
            ) {
                $price = (float)$this->sale_products[$explode[1]]['product_price_with_profit'];
                $quantity = (float)$this->sale_products[$explode[1]]['product_quantity'];
                $this->sale_products[$explode[1]]['gross_price'] = $price * $quantity;
                $this->sale_products[$explode[1]]['gross_price'] =
                 number_format($this->sale_products[$explode[1]]['gross_price'], 2, '.', '');
            }
            $this->calculateTotalProfit();
        }
         catch (\Exception $e) {
            $this->error_message = $e->getMessage();
            session()->flash('message', $e->getMessage());
        }
    }
    public function addEmptyRow()
    {
        $this->sale_products[] = [
            'product_id' => "",
            'product_price_with_profit' => "",
            'product_quantity' => "",
            'gross_price' => "",
        ];
        $this->profitRows[] = [];
    }
    public function addprofit($index)
    {
        $this->profitRows[$index][] = [
            'type' => "",
            'description' => "",
            'amount' => "",
        ];
        $this->calculateTotalProfit();
    }

    public function calculateTotalProfit()
    {
        $this->total_amount  = 0;
        $this->profit = 0;
        $this->expenditure = 0;
        try {
            foreach ($this->sale_products as $product) {
                if (isset($product['gross_price'])) {
                    $this->total_amount  += (float)$product['gross_price'];
                    $this->total_amount = number_format($this->total_amount, 2, '.', '');
                }
            }
            foreach ($this->profitRows as $profitRow) {
                foreach ($profitRow as $profit) {
                    $amount = (float)$profit['amount'];

                    if ($profit['type'] === 'Profit') {
                        $this->profit += $amount;
                        $this->profit = number_format($this->profit, 2, '.', '');
                        // dd($this->profit);
                    } else if ($profit['type'] === 'Expense') {
                        $this->expenditure += $amount;
                        $this->expenditure = number_format($this->expenditure, 2, '.', '');
                    }
                }
            }
        } catch (\Exception $e) {
            $this->error_message = $e->getMessage();
        }
    }
    public function deleteit($index, $profitIndex)
    {
        if (isset($this->profitRows[$index][$profitIndex])) {
            if ($this->profitRows[$index][$profitIndex]['type'] == 'Expense') {
                $this->expenditure -= $this->profitRows[$index][$profitIndex]['amount'];
            }
            if ($this->profitRows[$index][$profitIndex]['type'] == 'Profit') {
                $this->profit -= $this->profitRows[$index][$profitIndex]['amount'];
            }

            unset($this->profitRows[$index][$profitIndex]);
            if (empty($this->profitRows[$index])) {
                unset($this->profitRows[$index]);
            }

            $this->calculateTotalProfit();
        }
    }
    public function delete($index)
    {
        if (isset($this->sale_products[$index])) {
            $deletedProduct = $this->sale_products[$index];
            if (isset($deletedProduct['gross_price'])) {
                $this->total_amount -= (float) $deletedProduct['gross_price'];
            }
            unset($this->sale_products[$index]);

            if (isset($this->profitRows[$index])) {

                foreach ($this->profitRows[$index] as $profit) {
                    $amount = (float)$profit['amount'];

                    if ($profit['type'] === 'Profit') {
                        $this->profit -= $amount;
                    } else if ($profit['type'] === 'Expense') {
                        $this->expenditure -= $amount;
                    }
                }
                unset($this->profitRows[$index]);
                $this->profitRows = array_values($this->profitRows);
            }
            $this->sale_products = array_values($this->sale_products);
        }
    }
    public function store()
    {

        try {
            $this->validate(
                [
                    'sale_products.*.product_id' => 'required',
                    'sale_products.*.product_price_with_profit' => ['required', 'numeric'],
                    'sale_products.*.product_quantity' => ['required', 'numeric'],
                    'sale_products.*.gross_price' => 'required',
                    'profitRows.*.*.type' => 'required',
                    'profitRows.*.*.description' => 'required',
                    'profitRows.*.*.amount' => ['required', 'numeric', 'lte:sale_products.*.gross_price'],
                    'total_amount' => 'required',
                    'expenditure' => 'required',
                    'profit' => 'required',
                    'date' => 'required',
                ],
                [
                    'sale_products.*.product_price_with_profit.required' => 'Product Price  is required.',
                    'sale_products.*.product_price_with_profit.numeric' => 'Product Price  must be a number.',
                    'sale_products.*.product_quantity.required' => 'Product quantity is required.',
                    'sale_products.*.product_quantity.numeric' => 'Product quantity must be a number.',
                    'sale_products.*.gross_price.required' => 'Gross price is required.',
                    'profitRows.*.*.type.required' => 'Type is required.',
                    'profitRows.*.*.description.required' => 'Description is required.',
                    'profitRows.*.*.amount.required' => 'Profit amount is required.',
                    'profitRows.*.*.amount.numeric' => 'Profit amount must be a number.',
                    'profitRows.*.*.amount.lte' => 'Amount must be less than or equal to gross price.',
                    'total_amount.required' => 'Total amount is required.',
                    'expenditure.required' => 'Expenditure is required.',
                    'profit.required' => 'Profit is required.',
                    'date.required' => 'Date is required.',
                ]
            );

            $sale = Sale::create([
                'total_amount' => number_format($this->total_amount, 2, '.', ''),
                'expenditure' => $this->expenditure,
                'profit' => $this->profit,
                'date' => $this->date,
            ]);
            $this->sales_id = $sale->id;

            foreach ($this->sale_products as $index => $product) {
                $saleDetail = Saledetail::create([
                    'product_id' => $product['product_id'],
                    'sales_id' => $this->sales_id,
                    'product_price_with_profit' => number_format($product['product_price_with_profit'], 2, '.', ''),
                    'product_quantity' => $product['product_quantity'],
                    'gross_price' => number_format($product['gross_price'], 2, '.', ''),
                ]);

                foreach ($this->profitRows[$index] as $profitIndex => $profitAndExpense) {
                    ProfitAndExpense::create([
                        'type' => $profitAndExpense['type'],
                        'description' => $profitAndExpense['description'],
                        'amount' =>number_format($profitAndExpense['amount'], 2, '.', ''),
                        'sale_detail_id' => $saleDetail->id,
                        'sales_id' => $this->sales_id,
                    ]);
                }
            }
            $this->reset(['sale_products', 'profitAndExpense']);
            session()->flash('message', 'Sales details and related profit/expenses created successfully.');
            return redirect()->to(route('salelisting'));
        } catch (\Exception $e) {
            $this->error_message = $e->getMessage();
        }
    }
    public function searching()
    {
        $product = Product::query();
        if (!empty($this->product_name)) {
            $product = $product->where("product_name", "like", "%" . $this->product_name . "%");
        }
        $this->products = $product->get();
        $this->product_quantity = 1;
    }
    public function addProductToTable($productId)
    {
        $this->total_amount  = 0;
        try {
            $product = Product::find($productId);

            $existingProductIndex = array_search($productId, array_column($this->sale_products, 'product_id'));

            if ($existingProductIndex !== false) {
                $this->sale_products[$existingProductIndex]['product_quantity'] += 1;
                $this->calculateGrossPrice($existingProductIndex);
            } else {
                $emptyRowIndex = $this->findEmptyRowIndex();

                if ($emptyRowIndex !== null) {
                    $this->sale_products[$emptyRowIndex] = [
                        'product_id' => $product->id,
                        'product_name' => $product->product_name,
                        'product_price_with_profit' => $product->amount,
                        'product_quantity' => (int)$this->sale_products[$emptyRowIndex]['product_quantity'] + 1,
                    ];
                    $this->calculateGrossPrice($emptyRowIndex);
                } else {
                    $this->sale_products[] = [
                        'product_id' => $product->id,
                        'product_name' => $product->product_name,
                        'product_price_with_profit' => $product->amount,
                        'product_quantity' => 1,
                        'gross_price' => $product->amount,
                    ];
                }
            }
            foreach ($this->sale_products as $product) {
                if (isset($product['gross_price'])) {
                    $this->total_amount  += (float)$product['gross_price'];
                }
            }

            $this->search_modal = false;
            $this->products = [];
            $this->reset(['product_name']);
            return $productId;
        } catch (\Exception $e) {
            $this->error_message = $e->getMessage();
        }
    }
    private function calculateGrossPrice($index)
    {
        $this->sale_products[$index]['gross_price'] =
            (float)$this->sale_products[$index]['product_quantity'] *
            (float)$this->sale_products[$index]['product_price_with_profit'];
    }
    private function findEmptyRowIndex()
    {
        foreach ($this->sale_products as $index => $row) {
            if (empty($row['product_id'])) {
                return $index;
            }
        }
        return null;
    }
    public function render()
    {
        return view('livewire.createsale');
    }
    public function attributes()
    {
        return [
            'sale_products.*.product_price_with_profit' => 'Price',
            'sale_products.*.product_id' => 'Product',
            'sale_products.*.product_quantity' => 'Product quantity',
            'sale_products.*.gross_price' => 'Gross price',
            'profitRows.*.*.type' => 'Type',
            'profitRows.*.*.description' => 'Description',
            'profitRows.*.*.amount' => 'Amount',

        ];
    }
}
