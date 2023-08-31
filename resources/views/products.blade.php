<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{route('product.create')}}">add product</a>
       <a href="{{route('category.index')}}">Categories</a>
       <a href="{{route('order.index')}}">orders</a>
    <br><br>
    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>price</th>
                <th>availablity</th>
                <th colspan="5">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($products as $product )
            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->availability}}</td>
                <td><button><a href="products/{{$product->id}}">show</a></button></td>
                <td>
                <form action="{{route('product.destory',$product->id)}}" method="post">
                @method('delete')
                @csrf
                <button>delete</button>
                </form>
                </td>
                <td>
                <form action="{{route('product.update',$product->id)}}" method="get">
                <button>update</button>
                </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

</body>
</html>
