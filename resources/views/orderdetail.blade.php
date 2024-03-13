@extends('layouts.app')

@section('content')


<div id="cart" class="container-fluid dls-block">
    <div class="container">
        <div class="filltop"></div>
        <h2 class="block-title">Your Order</h2>
        <div id="order-block">
        	<h3 style="font-family: 'Bebas Neue';">Your order is complete!</h3>
            <i>You will receive an email notification from us with your order Summary. If you do not receive one, please call us at: 
    +95 96901 2000 (MYANMAR), <br>+95 96901 8000 (ENGLISH)</i>
        	<div class="row">
        		@foreach($order->items as $item)
        			<div class="col-md-2 item-block-no-bg">
        				<h4 class="nimbus">{{$item->title}}</h4>
						<img src="{{$item->image_filepath}}{{$item->image_filename}}">
						<h5><i>{{number_format($item->price)}} KS</i></h5>
					</div>
				@endforeach
        	</div>
        	<div id="payment_info" class="row" style="padding: 20px; background: #f9f9f9; margin-top: 20px;">
        		<div class="col-md-12">
                    @if($order->total_amount < 100000)
        			     <p style="font-family: 'baskervillebold'; font-size: 20px;">Please pay the total amount {{$order->total_amount + $order->delivery_fee}} MMK (Delivery Fee Included) to the following accounts.</p>
                    @else
                        <p style="font-family: 'baskervillebold'; font-size: 20px;">Please pay the total amount {{$order->total_amount}} MMK (Free Delivery) to the following accounts.</p>
                    @endif
        		<hr>

        		</div>
        		<div class="col-md-4">
        			<h4 class="nimbus">KBZ Pay</h4>
        			<h4 class="nimbus">Please Scan To Pay Below</h4>
        			<img src="img/kbzpay.jpg" style="width: 50%;">
        		</div>
        		<div class="col-md-1">
        		    <h5 class="" style="font-family: 'baskervillebold'">OR</h5>    
        		</div>
        		<div class="col-md-3">
        			<h4 class="nimbus">Wave Money</h4>
        			<h4 class="nimbus">09978899140</h4>
        		</div>
        		<div class="col-md-1">
                    <h5 class="" style="font-family: 'baskervillebold'">OR</h5>    
                </div>
                <div class="col-md-3">
                    <h4 class="nimbus">KBZ Bank Transfer</h4>
                    <h4 class="nimbus">1603-0116-0008-2500-1</h4>
                </div>
        	</div>
			<div>
                <i>Once after you have transferred the total amount, please contact us at +95 96901 2000 (MYANMAR), +95 96901 8000 (ENGLISH)</i>         
            </div>
        </div>
    </div>
	
</div>

@stop