@extends('store.store')

@section('categories')
    @include('store.partial.categories')
@stop

@section('content')
<div class="col-sm-9 padding-right">
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Featured</h2>
                
        @include('store.partial.products', ['products' => $pFeatured])
        
    </div><!--features_items-->



    <div class="features_items"><!--recommended-->
        <h2 class="title text-center">Recommended</h2>
        
        @include('store.partial.products', ['products' => $pRecommended])
        
    </div><!--recommended-->

</div>
@stop