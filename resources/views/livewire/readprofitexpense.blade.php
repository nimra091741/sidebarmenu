<div>
@foreach ($profit as $item)
<h4>{{ $item->type }}|{{ $item->description }}|{{ $item->amount }}
</h4>
@endforeach
</div>