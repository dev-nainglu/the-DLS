
@extends('layouts.app')

@section('content')

<div id="detail" class="dls-block">
	<div class="filltop"></div>
	<div class="filltop"></div>

	<div class="container" id="item-detail">
		@if(session()->has('msg'))
		<div class="alert alert-dismissible fade show" role="alert" style="background: #231f20; color: #b3b3b3; font-family: 'baskervilleboldit';">
		  {{session()->get('msg')}} <a href="/cart" style="color: #b3b3b3; text-decoration: underline;">Go to your cart.</a>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
		@endif
		<div class="row">
			<div class="col-md-5 col-sm-12">
				<img src="{{'/'.$bakery->image_filepath.$bakery->image_filename}}" class="item-detail-image">
			</div>	
			<div class="col-md-5 item-detail">
				<!-- hidden form field -->

				<!-- hidden form field end -->
				<h1 class="block-title">{{$bakery->title}}</h1>
				<p class="item-descr">{{$bakery->description}}</p>
				<h4 class="item-detail-price"><i>{{number_format($bakery->price)}} KS</i></h4>
				@if(count($cakegory->sizes))
				<h3 class="item-detail-size-title item-detail-title nimbus">SIZE</h3>
					<ul class="item-sizes">
						@foreach($cakegory->sizes as $size)
							@if($size->size == '6"' || $size->size == '6s' || $size->size == '11"')
								<li class="selected item-size" data-val="{{$size->size}}">{{$size->size}}</li>
							@else
								<li class="item-size" data-val="{{$size->size}}">{{$size->size}}</li>
							@endif
							<input type="hidden" id="item_{{str_replace('"', '', $size->size)}}" value="{{$size->price}}">
						@endforeach
					</ul>
				@endif
				<form action="/bakery/order" method="POST">
					{{csrf_field()}}
					<h3 class="item-detail-title nimbus">QUANTITY</h3>
					<input type="hidden" name="id" value="{{$bakery->id}}">
					<input type="hidden" name="cake_size" value='6"' id="cake_size">
					<input type="hidden" name="cake_price" value="80000" id="cake_price">
					<input id="spinner" name="quantity" placeholder="1" class="item-detail-input" value="1">
					<h3 class="item-detail-title nimbus">CANDLES</h3>
					<select class="form-control item-detail-input" name="candle">
						<option value="0">No</option>
						<option value="1">Yes</option>
					</select>
					<button href="#" class="btn btn-orderonline" type="submit">Add To Cart</button>
					<h3 class="item-detail-title nimbus">NOTE</h3>
					<textarea id="item-order-request" name="remark"></textarea>
					
					<button href="#" class="btn btn-orderonline" type="submit">Check Out</button>
				</form>
				
				<ul class="cakegory_notes">
					@foreach(config('constant.cakegory_notes')[$bakery->cakegory_id] as $cake_note)
						<li><h5>{{$cake_note}}</h5></li>
					@endforeach
				</ul>
				<p class="item-notes">
					{{$bakery->item_notes}}
				</p>
			</div>	
		</div>
	</div>
</div>
<script type="text/javascript">
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
    $('.item-detail-price i').html(numberWithCommas($("#item_"+$('.item-size.selected').attr('data-val').replace('"', '')).val())+' KS');
    $('#cake_size').val($('.item-size.selected').attr('data-val'));
	$('#cake_price').val($("#item_"+$('.item-size.selected').attr('data-val').replace('"', '')).val());
	$("#spinner").spinner({min: 1});
	$(".item-size").click(function(){
		$('.item-sizes li').attr('class', 'item-size');
		var size = $(this);
		size.attr('class', 'item-size selected');
		$('#cake_size').val(size.attr('data-val'));
		$('#cake_price').val($("#item_"+size.attr('data-val').replace('"', '')).val());
		$('.item-detail-price i').html(numberWithCommas($("#item_"+size.attr('data-val').replace('"', '')).val())+' KS');
	});
</script>

@stop
