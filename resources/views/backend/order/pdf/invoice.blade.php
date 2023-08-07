<!DOCTYPE html>
<html>

<head>
    <style>
    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
    }
    </style>
</head>

<body>

    <h1 class="text-center">Order Invoice</h1>

    <table id="customers">
        <tr>
            <th>SI</th>
            <th>Customer Name</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Order Date</th>
            <th>Total Price</th>
        </tr>
        <tr>
            @php $i = 1 @endphp
            @foreach($order as $orders)
            <td>{{$i++}}</td>
            <td>{{$orders->user->name}}</td>
            <td>{{$orders->product->product_name}}</td>
            <td>{{$orders->quantity}}</td>
            <td>{{$orders->order_date}}</td>
            <td>{{$orders->total_price}}</td>
        @endforeach
        </tr>
    </table>

</body>

</html>