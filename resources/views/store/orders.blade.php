@extends('store.store')

@section('content')
    <section id="cart_items">

        <div class="container">

            <h3>My orders</h3>
            <br>
            <div class="table-responsive cart_info">
                @foreach ($orders as $order)
                    <h4>Order # {{ $order->id }} </h4>
                    <h5>Status: {{ $order->status }}</h5>
                    <table class="table table-condensed">
                        <thead>
                            <tr class="cart_menu">
                                <td class="image">Item</td>
                                <td class="price">Price</td>
                                <td class="price">Quantity</td>
                                <td class="price">Subtotal</td>

                            </tr>
                        </thead>
                        <tbody>
                    @foreach($order->items as $item)
                        <tr>
                            <td class="cart_product">
                                <a href="{{ route('store.product', ['id' => $item->product_id]) }}">
                                    {{ $item->product->name }}
                                </a>
                            </td>
                            <td class="cart_price">
                                U$ {{$item->price}}
                            </td>
                            <td class="cart_quantity">
                                <p class="cart_total_price">{{$item->qtd }}</p>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">U$ {{$item->price * $item->qtd}}</p>
                            </td>

                        </tr>
                    @endforeach
                    <tr class="cart_menu">
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
        </div>
    </section>
@stop


