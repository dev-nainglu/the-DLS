Our precious customer called {{$order->buyer_name}} with phone number {{$order->buyer_phone}} ordered <br>

@if(count($order->items) > 0)
	@foreach($order->items as $item)
		{{$item->name}}
	@endforeach

@endif