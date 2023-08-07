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

    <h1 class="text-center">Product Invoice</h1>

    <table id="customers">
        <thead>
            <tr>
                <th>SI</th>
                <th>Category Name</th>
                <th>Sub Category Name</th>
                <th>Child Category Name</th>
                <th>Name</th>
                <th>Title</th>
                <th>Price</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 1 @endphp
            @foreach($product as $products)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$products->category->category_name}}</td>
                <td>{{$products->SubCategory->sub_category_name}}</td>
                <td>{{$products->childcategory->child_category_name}}</td>
                <td>{{$products->product_name}}</td>
                <td>{{$products->product_title}}</td>
                <td>{{$products->product_price}}</td>
                <td>{{Str::limit($products->product_description,12)}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>