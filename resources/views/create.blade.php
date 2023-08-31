<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="product_name" placeholder="name">
        <input type="file" name="image" placeholder="picture">
        <input type="text" name="product_availability" placeholder="availability">
        <input type="text" name="product_price" placeholder="price">
        <input type="text" name="category_id" placeholder="category_id">
        <input type="text" name="admin_id" placeholder="admin_id">
        <button type="submit">submit</button>
    </form>
</body>

</html>
