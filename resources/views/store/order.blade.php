@extends('store.store')

@section('content')
    <section id="cart_items">
        <div class="container">
            <h2>Order Nº.: {{ $order->id }}</h2>
            <div class="table-responsive cart_info">
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
                                    Imagem
                                </a>
                                <p>Code: {{ $item->product_id }}</p>
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
            </div>
        </div>
    </section>
@stop


