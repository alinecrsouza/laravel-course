@extends('app')

@section('content')
<div class="container">
    <h1>Create Product</h1>
    
    @if($errors->any())
        <ul class="alert">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    
    {!! Form::open(['route'=>'admin.products.store']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('price', 'Price:') !!}
            {!! Form::input('number', 'price', null, ['class' => 'form-control', 'step' => 'any']) !!}
        </div>
        <div class="checkbox">
            {!! Form::hidden('featured', 0) !!}
            <label>			
                {!! Form::checkbox('featured', 1, null) !!} Featured?		
            </label>
        </div>
        <div class="checkbox">
            {!! Form::hidden('recommend', 0) !!}
            <label>			
                {!! Form::checkbox('recommend', 1, null) !!} Recommend?		
            </label>
        </div>
        
<!--            {!! Form::label('featured', 'Featured?', ['class' => 'checkbox-inline']) !!}
            {!! Form::checkbox('featured', 1, null) !!}
        
        
            {!! Form::label('recommend', 'Recommend?', ['class' => 'checkbox-inline']) !!}
            {!! Form::checkbox('recommend', 1, null) !!}-->
        
        <div class="form-group">
            {!! Form::submit('Add Product', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    {!! Form::close() !!}
    
</div>
@endsection

