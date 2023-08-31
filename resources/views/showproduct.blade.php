<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>availablity</th>
                <th>price</th>
                <th>category name</th>
                {{-- <th>admin id</th> --}}
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->availability }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->category->name }}</td>
                {{-- <td>{{ $product->admin_id }}</td> --}}
                </td>
            </tr>
        </tbody>
    </table>

</body>

</html>
