<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
</head>
<body>
    <h4>Add Category</h4>
    <hr>
    <!-- Showing Status Message if add, update and delete is successfully -->
        @if(session('status'))
            <div>{{session('status')}}</div>    
        @endif

    <form action="{{route('categories.store')}}" method="post" autocomplete=off>
        @csrf
        <label>Name:</label><input type="text" name="name"><br><br>
        <input type="submit" value="Add Category">
    </form>

    <hr>
    <!-- Category Table Start -->
    <table border='1'>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
                @if(count($categories))    
                @foreach($categories as $key=>$category)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$category->name}}</td>
                        <td>
                            <a href="{{'categories/edit/'.$category->id}}" class="btn btn-success">Edit</a>
                            <a href="{{'categories/delete/'.$category->id}}" class="btn btn-danger mt-2">Delete</a>
                        </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="2">
                       <span> No Data Found </span> 
                    </td>
                </tr>
                @endif
            </tbody>

    </table>
    <!-- Category Table end -->
</body>
</html>