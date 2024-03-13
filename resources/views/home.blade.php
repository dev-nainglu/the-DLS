@extends('layouts.app')

@section('content')

<div class="slideshow" style="background-image: url({{asset('img/home.jpg')}})">
    
</div>
<div id="about-us" class="dls-block" style="border-bottom: 1px solid #e6e3e3;">
    
    <div class="container" id="about-us-detail">
        <h2 class="block-title"><?php print_r($home_posts['aboutus'][0]->title); ?></h2>
       {!! $home_posts['aboutus'][0]->post !!}
    </div>
    
</div>
<div id="best-sellers" class="dls-block">
    <div class="container">
            <h2 class="block-title">Our Best Sellers</h2>
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
            <a href="/cakegory/wholecakes" class="btn btn-orderonline">Order Online</a>
    </div>
</div>
<div id="retail-outlet" class="slideshow" style="background-image: url({{asset('img/retailoutlet.jpg')}})">
    <h2 class="block-title"><?php print_r($home_posts['retailoutlet'][0]->title); ?></h2>
    {!! $home_posts['retailoutlet'][0]->post !!}
</div>
<div id="events" class="dls-block">
    <h2 class="block-title"><?php print_r($home_posts['events'][0]->title); ?></h2>
    <div class="container" id="about-us-detail">
        {!! $home_posts['events'][0]->post !!}
    </div>
</div>

@stop