@extends('layouts.app')

@section('content')


<div id="cart" class="container-fluid dls-block">
    <div class="container">
            <div class="filltop"></div>
            <h2 class="block-title">Your Cart</h2>
            <div id="cart-block">
                <div class="row">
                    <div class="col-md-6 p-0">
                        <h4 class="nimbus cart-title">ITEM</h4>
                    </div>
                    <div class="col-md-3 p-0">
                        <h4 class="nimbus cart-title">QUANTITY</h4>
                    </div>
                    <div class="col-md-3 p-0">
                        <h4 class="nimbus cart-title">TOTAL</h4>
                    </div>
                </div>
                <form action="/checkout" method="POST" onsubmit="checkminiorder()">
                    {{csrf_field()}}
                 @if($cart)
                    <?php
                        $i = 0;
                    ?>
                    @foreach($cart as $item)
                        <?php
                            $i += 1;
                        
                        ?>
                        <input type="hidden" name="item[id][]" value="{{$item['item']->id}}">
                        <div class="row cart_row" style="margin-top: 15px;" id="cart_row_{{$i}}">
                            <div class="col-md-6 row">
                                <div class="col-md-5">
                                    <img src="{{$item['item']->image_filepath.$item['item']->image_filename}}" class="cart-item-img">
                                </div>
                                <input type="hidden" name="item[size][]" value="{{$item['cake_size']}}">
                                <input type="hidden" name="item[candle][]" value="{{$item['candle']}}">
                                <div class="col-md-7 cart-item-detail">
                                    <h3>{{$item['item']->title}}</h3>
                                    <h5>{{$item['cake_size']}}</h5>
                                    <p style="font-family: 'Abel'; font-size: 20px;">{{$item['item']->description}}</p>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <input class="spinner" name="item[quantity][]" placeholder="1" class="item-detail-input" value="{{$item['quantity']}}" id="quan_{{$i}}">
                            </div>
                            <input type="hidden" name="item[remark][]" value="{{$item['remark']}}">
                            <div class="col-md-3">
                                <input type="hidden" id="item_price_{{$i}}" value="{{$item['cake_price']}}" class="item_orig_price" data-id="price_{{$i}}" data-quan="{{$item['quantity']}}">
                                <div class="remove-item-x" style="width: 30px;height: 30px; float: right;" data-key="{{$i}}">X</div>
                                <h5 class="cart-item-price"><span id="price_{{$i}}" class="item_price">{{number_format($item['cake_price'])}}</span> KS</h5>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h4 class="nimbus">You don't have items in your cart.<h4>
                @endif
                <div class="row cart-low-total">
                    <div class="col-md-6 p-0">
                        
                    </div>
                    <div class="col-md-3 p-0">
                        <h4 class="nimbus">SUB TOTAL</h4>
                    </div>
                    <div class="col-md-3 p-0">
                        <h4 class="nimbus"><span id="total_price">80000</span> KS</h4>
                    </div>
                </div>
                <div class="row checkout-detail">
                    <div class="col-md-8">
                        
                    </div>

                    <div class="col-md-4 checkout-detail-info">
                        <p>
                            Shipping, taxes, and discounts are calculated at checkout. Please wait for date/time picker to load below.
                        </p>
                        
                            <input type="checkbox" name="tnc" required> I agree with the <b>Terms and Conditions</b> and <b>Cancellation Policies.</b>
                            
                            <div class="checkout-deliver-type-div" style="margin-top: 20px;">
                                <div class="checkout-deliver-type selected" data-type="pickup">
                                    <img src="{{asset('img/shop.png')}}">
                                    <h4 class="nimbus" style="text-align: center;">PICK UP</h4>
                                </div>
                                <input type="hidden" name="delivery_type" value="delivery" id="cart_delivery_type">
                                <div class="checkout-deliver-type" data-type="delivery">
                                    <img src="{{asset('img/truck.png')}}">
                                    <h4 class="nimbus" style="text-align: center;">DELIVERY</h4>
                                </div>
                            </div>
                            <p>
                                Delivery charges are applicable for orders under 80,000ks. Delivery charges vary depending on location.
                            </p>
                            <div style="height: 40px;">
                                <div class="datepickerdiv">
                                    <input type="text" name="datetime" id="datepicker" placeholder="Choose a date and time slot" required>
                                </div>
                            </div>
                            <p style="margin-top: 20px;">
                                Please select a delivery date and time slot from the date picker below. Dates that cannot be clicked on means our slots are full!
                            </p>
                            <div class="form-group">
                                <label><h4>Enter Your Name</h4></label>
                                <input type="text" name="buyer_name" id="buyer_name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label><h4>Enter Your Phone Number</h4></label>
                                <input type="text" name="buyer_phone" id="buyer_phone" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label><h4>Enter Your Email</h4></label>
                                <input type="text" name="buyer_email" id="buyer_email" class="form-control" required>
                            </div>
                            <div class="form-group delivery-popup inactive">
                                <label><h4>Select Township</h4></label>
                                <select name="buyer_township" class="form-control" id="buyer_township">
                                    <option value="">Choose Township</option>
                                    @foreach(config('app.township') as $key => $value)
                                        <option value="{{config('app.township_deli_fee')[$key]}}-{{$value}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group delivery-popup inactive">
                                <label><h4>Enter Your Address</h4></label>
                                <textarea class="form-control" name="buyer_address" id="buyer_address"></textarea>
                            </div>
                            <div class="form-group">
                                <i style="font-size: 8px;">Do you have a promo code?</i></br>
                                <label><h4>Enter Promo Code</h4></label>
                                
                                <input type="text" name="promo_code" id="promo_code" class="form-control">
                            </div>
                            <span id="error_msg" style="color: red;"></span>
                            <div style="height: 40px; margin-top: 20px; margin-bottom: 20px;">
                                <button type="submit" id="checkout_butt" class="btn btn-orderonline" style="font-family: nimbus; margin-top:0; line-height: 25px; font-size: 20px; float: right;">CHECKOUT >></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
	
</div>
<script type="text/javascript">

    function checkminiorder(){
        var tprice = 0;
        $(".item_price").each(function(){
            tprice += parseInt($(this).html());
        });
        if(tprice <= 30000){
            $("#error_msg").html("* Minimum order is 30,000KS. Please buy more!");
            event.preventDefault();
            return false;
        }
    }

    $("#buyer_email").focusout(function(){
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($(this).val()))
        {
            $("#error_msg").html("");
            $("#checkout_butt").attr("disabled", false);
        }else{
            $("#error_msg").html("* your email address is invalid. please enter correct email!");
            $("#checkout_butt").attr("disabled", true);
        }
        
    })

    

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    $(".item_orig_price").each(function(){
        var p = $(this).val() * $(this).attr('data-quan');
        $("#"+$(this).attr('data-id')).html(p);
    });
    function total_price(){
        var tprice = 0;
        $(".item_price").each(function(){
            tprice += parseInt($(this).html());
        });
        $("#total_price").html(numberWithCommas(tprice));
    }total_price();
    
    $(".spinner").spinner({
        min: 1,
    });
    var dateToday = new Date(new Date().getTime()+(2*24*60*60*1000));
    $( "#datepicker" ).datepicker({
        showOn: "button",
        buttonImage: "http://jqueryui.com/resources/demos/datepicker/images/calendar.gif",
        buttonImageOnly: true,
        defaultDate: "+1w",
        changeMonth: true,
        minDate: dateToday
    });
    
    $(".checkout-deliver-type").click(function(){
        $(".checkout-deliver-type").removeClass('selected');
        $(this).addClass('selected');
        var dtype = $(this).attr('data-type');
        if(dtype == 'delivery'){
            console.log(dtype);
            $(".delivery-popup").removeClass('inactive');
            $("#buyer_township").attr("required", true);
            $("#buyer_address").attr("required", true);
        }else{
            console.log(dtype);
            $(".delivery-popup").addClass('inactive');
            $("#buyer_township").attr("required", false);
            $("#buyer_address").attr("required", false);
        }
        $("#cart_delivery_type").val(dtype);
    });
    $(".remove-item-x").click(function(){
        var key = $(this).attr('data-key');
        $.get('/removecart/'+key, function(data, status){
            if(data != null){
                $("#cart_row_"+key).fadeOut(500);
                //$("#cart_row_"+key).remove();
            }else{
                console.log("remove cart error");
            }
        });
        var t = parseInt($("#total_price").html()) - parseInt($("#price_"+key).html());
        $("#total_price").html(t);
    });
    
    $(".ui-spinner-up").click(function(){
        var id = $(this).siblings('input').attr('id');
        var key = id.split('_')[1];
        var vnow = $(this).siblings('input').attr('aria-valuenow');
        var vmain = $('#item_price_'+key).val();
        var vtotal = vnow * vmain;
        $('#price_'+key).html(vtotal);
        total_price();
    });
    $(".ui-spinner-down").click(function(){
        var id = $(this).siblings('input').attr('id');
        var key = id.split('_')[1];
        var vnow = $(this).siblings('input').attr('aria-valuenow');
        var vmain = $('#item_price_'+key).val();
        var vtotal = vnow * vmain;
        $('#price_'+key).html(vtotal);
        total_price();
    });
</script>
@stop