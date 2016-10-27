@extends('app')

@section('content')
<div class="container">
    <h1>Images of {{ $product->name }}</h1>
       
    <a href="{{ route('admin.products.images.create')}}" class="btn btn-default">New Image</a>
    <br><br>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Extension</th>            
            <th>Action</th>
        </tr>
        @foreach($product->images as $image)
        <tr>
            <td>{{ $image->id }}</td>
            <td></td>
            <td>{{ $image->extension }}</td>            
            <td>
                <!--<a href="{{ route('admin.products.edit', ['id' => $image->product->id])}}">Edit</a> |
                <a href="{{ route('admin.products.destroy', ['id' => $image->product->id])}}">Delete</a>-->
            </td>
        </tr>
        @endforeach
    </table>  
    
</div>
@endsection

