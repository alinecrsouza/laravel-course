@extends('store.store')

@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description"></td>
                            <td class="price">Price</td>
                            <td class="price">Quantity</td>
                            <td class="price">Subtotal</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($cart->all_items() as $k=>$item)
                        <tr>
                            <td class="cart_product">
                                <a href="{{ route('store.product', ['id' => $k]) }}">
                                    Imagem
                                </a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="{{ route('store.product', ['id' => $k]) }}">{{ $item['name'] }}</a> </h4>
                                <p>Code: {{ $k }}</p>
                            </td>
                            <td class="cart_price">
                                U$ {{$item['price']}}
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <input class="cart_quantity_input" type="number" min="1" max="99" style="width: 4em;" name="quantity" id="quantity" value="{{$item['qtd']}}" onChange="updateQty('{{ $k }}' , this.value)">
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">U$ {{$item['price'] * $item['qtd']}}</p>
                            </td>
                            <td class="cart_delete">
                                <a href="{{ route('store.cart.destroy', ['id' => $k]) }}" class="cart_quantity_delete">Delete</a>
                            </td>

                        </tr>
                    @empty
                         <tr>
                             <td class="" colspan="6">
                                 <p>No items found.</p>
                             </td>
                         </tr>
                    @endforelse
                    <tr class="cart_menu">
                        <td colspan="6">
                            <div class="pull-right">
                                <span style="margin-right: 2vw">
                                    Total: U$ {{ $cart->getTotal() }}
                                </span>
                                <a href="#" class="btn btn-success">Proceed to checkout</a>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <script>
        function updateQty(id ,value){
                var url =  "{{ route('store.cart.item.qty.update', ['id' => ':id', 'qty' => ':value']) }}";
                url = url.replace(':id', id);
                url = url.replace(':value', value);
                document.location.href = url;
        }
    </script>

@stop


