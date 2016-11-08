@extends('app')

@section('content')
<div class="container">
    <h1>Editing Product: {{ $product->name }}</h1>

    @if($errors->any())
    <ul class="alert">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif

    {!! Form::open(['route'=>['admin.products.update', $product->id], 'method'=>'put']) !!}
    <div class="form-group">
        {!! Form::label('category', 'Category:') !!}
        {!! Form::select('category_id', $categories, $product->category->id, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', $product->name, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Description:') !!}
        {!! Form::textarea('description', $product->description, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('price', 'Price:') !!}
        {!! Form::input('number', 'price', $product->price, ['class' => 'form-control', 'step' => 'any']) !!}
    </div>
    <div class="checkbox">
        {!! Form::hidden('featured', 0) !!}
        <label>			
            {!! Form::checkbox('featured', 1, $product->featured) !!} Featured?		
        </label>
    </div>
    <div class="checkbox">
        {!! Form::hidden('recommend', 0) !!}
        <label>			
            {!! Form::checkbox('recommend', 1, $product->recommend) !!} Recommend?		
        </label>
    </div>
    <div class="form-group">
        {!! Form::label('tags', 'Tags:', ['class'=>'control-label']) !!}
        {!! Form::textarea('tags', $product->tagList,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Save Product', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}

</div>
@endsection

