@extends('store.store')

@section('categories')
@include('store.partial.categories')
@stop

@section('content')

<div class="col-sm-9 padding-right">
    <div class="product-details"><!--product-details-->
        <div class="col-sm-5">
            <div class="view-product">
                @if(count($product->images))
                <img src="{{ url('uploads/'.$product->images->first()->id.'.'.$product->images->first()->extension)}}" alt="" width="200"/>
                @else
                <img src="{{ url('images/no-img.png')}}" alt="" width="200"/>
                @endif
            </div>
            @if(count($product->images)>1)
            <div id="similar-product" class="carousel slide" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        @foreach($product->images as $image)
                        <img src="{{ url('uploads/'.$image->id.'.'.$image->extension)}}" alt="" width="80"/>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif

        </div>
        <div class="col-sm-7">
            <div class="product-information"><!--/product-information-->

                <h2>{{$product->category->name}} :: {{ $product->name }}</h2>

                <p>{{ $product->description }}</p>
                <span>
                    <span>$ {{ $product->price }}</span>
                    <a href="{{ route('store.cart.add', ['id' => $product->id]) }}" class="btn btn-default cart">
                        <i class="fa fa-shopping-cart"></i>
                        Add to cart
                    </a>
                </span>
                <p>
                    @foreach($product->tags as $tag)
                    <a href="{{ route('store.tag', ['id'=>$tag->id]) }}" class="label label-primary">{{ $tag->name }}</a>
                    @endforeach
                </p>
            </div>

            <!--/product-information-->
        </div>
    </div>
    <!--/product-details-->
</div>
@stop
