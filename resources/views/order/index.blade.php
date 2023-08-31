<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <br><br>
    <table border="1">
        <thead>
            <tr>
                <th>id</th>
                <th>price</th>
                <th>user name</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($orders as $order )
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->price}}</td>
                <td>{{$order->user->name}}</td>
            </tr>
            @endforeach

        </tbody>
    </table>

</body>
</html>
