@extends('store.store')

@section('categories')
    @include('store._categories')
@stop

@section('content')
<div class="col-sm-9 padding-right">
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Featured</h2>
        @foreach($pFeatured as $product)
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        @if(count($product->images))
                        <img src="{{ url('uploads/'.$product->images->first()->id.'.'.$product->images->first()->extension)}}" alt="" width="200"/>
                        @else
                        <img src="{{ url('images/no-img.png')}}" alt="" width="200"/>
                        @endif
                        <h2>$ {{ $product->price }}</h2>
                        <p>{{ $product->name }}</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>More details</a>

                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <h2>$ {{ $product->price }}</h2>
                            <p>{{ $product->name }}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>More details</a>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div><!--features_items-->



    <div class="features_items"><!--recommended-->
        <h2 class="title text-center">Recommended</h2>
        @foreach($pRecommended as $product)
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        @if(count($product->images))
                        <img src="{{ url('uploads/'.$product->images->first()->id.'.'.$product->images->first()->extension)}}" alt="" width="200"/>
                        @else
                        <img src="{{ url('images/no-img.png')}}" alt="" width="200"/>
                        @endif
                        <h2>$ {{ $product->price }}</h2>
                        <p>{{ $product->name }}</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>More details</a>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <h2>$ {{ $product->price }}</h2>
                            <p>{{ $product->name }}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>More details</a>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div><!--recommended-->

</div>
@stop