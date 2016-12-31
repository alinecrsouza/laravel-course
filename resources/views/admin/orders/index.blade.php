@extends('app')

@section('content')


    <div class="container">
        <h1>Orders</h1>
        <br>
        <div class="table-responsive">
            @foreach ($orders as $order)
                <h4>Order # {{ $order->id }} </h4>
                {!! Form::open(['route'=>['admin.orders.update', $order->id], 'method'=>'put']) !!}
                {!! Form::select('status', [
                    '0' => 'Pending Payment',
                    '1' => 'Processing',
                    '2' => 'On Hold',
                    '3' => 'Completed',
                    '4' => 'Cancelled',
                    '5' => 'Refunded',
                    '6' => 'Failed'],
                $order->status) !!}
                <div class="form-group">
                    {!! Form::submit('Update Status', ['class' => 'btn btn-primary form-control']) !!}
                </div>
                {!! Form::close() !!}
                <table class="table table-condensed">
                    <thead>
                    <tr>
                        <td>Item</td>
                        <td>Price</td>
                        <td>Quantity</td>
                        <td>Subtotal</td>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->items as $item)
                        <tr>
                            <td>
                                <a href="{{ route('store.product', ['id' => $item->product_id]) }}">
                                    {{ $item->product->name }}
                                </a>
                            </td>
                            <td>
                                U$ {{$item->price}}
                            </td>
                            <td>
                                <p>{{$item->qtd }}</p>
                            </td>
                            <td>
                                <p>U$ {{$item->price * $item->qtd}}</p>
                            </td>

                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="6">
                            <div class="pull-right">
                                <span style="margin-right: 2vw">
                                    Total: U$ {{ $order->total }}
                                </span>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <br>
            @endforeach
        </div>
        {!! $orders -> render() !!}
    </div>

@stop


