<div>
    @foreach ($saledetail as $item)
    <h4>{{ $item->product_price_with_profit }}|{{ $item->product_quantity }}|{{ $item->gross_price }}
    </h4>
    
@endforeach
</div>
