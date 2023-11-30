<div>
    @foreach ($sales as $item)
    <h4>{{ $item->total_amount }}|{{ $item->expenditure }}|{{ $item->profit }}|{{ $item->date }}
    </h4>
    @endforeach
</div>
