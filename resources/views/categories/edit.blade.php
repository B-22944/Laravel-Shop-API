<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Category</title>
</head>
<body>
    <h4>Update Category</h4>
    <hr>
    <form action="{{route('categories.update')}}" method="post" autocomplete=off>
        @csrf
        <input type="hidden" name="id" value="{{$category->id}}">
        <label>Name:</label><input type="text" name="name" value="{{$category->name}}"><br><br>
        <input type="submit" value="Update Category">
    
    </form>
    
</body>
</html>