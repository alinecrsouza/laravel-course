<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>
    <p>Hi {{$user->name}},</p>

    <p>Here is a summary of your recent order. </p>

    <p>Thank you for shopping on Star Tech!</p>

    <p><strong>You order # is: {{ $order->id }}</strong></p>
    <br>
    <div>
        <table>
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
                        <p>{{ $item->product->name}}</p>
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
                <td colspan="4">
                    Total: U$ {{ $order->total }}
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</body>
</html>