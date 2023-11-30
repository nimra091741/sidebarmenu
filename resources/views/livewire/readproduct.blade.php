<div>
    @foreach ($products as $item)
    <h4>{{ $item->product_name }}|{{ $item->description }}|{{ $item->amount }}|{{ $item->product_type }}</h4>
    @endforeach
</div>
