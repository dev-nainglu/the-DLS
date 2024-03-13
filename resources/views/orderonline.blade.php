@extends('layouts.app')

@section('content')

<div class="slideshow" style="background-image: url({{asset($cakegory->image_filepath.$cakegory->image_filename)}})">
    <h1 class="page-title">Order Online</h1>
    <h1 class="page-sub-title" style="text-transform: uppercase;">{{$cakegory->name}}</h1>
</div>
<div id="order-online" class="container-fluid dls-block">
    <div class="container">
            <h2 class="block-title">{{$cakegory->name}}</h2>
            <h4 class="nimbus" style="text-align: center;">{{$cakegory->size_range}}</h4>
            <div class="row">
                @foreach($items as $item)
                    <div class="col-md-4 item-block">
                        <a href="/bakery/{{$item->id}}" class="item-link">
                        <img src="{{asset($item->image_filepath.$item->image_filename)}}">
                            <h3 class="nimbus">{{$item->title}}</h3>
                            <p style="font-family: 'Abel'; font-size: 16px;">
                                {{$item->description}}
                            </p>
                        </a>
                        <h5><i>From {{number_format($item->price)}} KS</i></h5>
                    </div>
                @endforeach
            </div>
    </div>
	
</div>

@stop