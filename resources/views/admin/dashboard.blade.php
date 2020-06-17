<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style type="text/css">
        .container{
            margin-left: 300px;
            margin-right: 100px;
        }
        .table{
            border-collapse:collapse;
            border: 1px solid black;
            width: 1000px;
        }
    </style>
</head>
<body>
    <div class="container">
        <table border="1" class="table">
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Category</th>
                <th>Tags</th>
                <th>Description</th>
                <th>image</th>
                <th>Delete</th>
                <th>Update</th>
            </tr>

            @foreach ($photos as $photo)
                <tr>
                    <td>{{$photo->id}}</td>
                    <td>{{$photo->title}}</td>
                    <td>{{$photo->category->name}}</td>
                    <td>
                        @foreach($photo->tags as $tag)
                            {{$tag->name}}
                        @endforeach
                    </td>
                    <td>
                    {{$photo->description->content}}
                    
                    </td>
                    <td><img src="{{'/storage/'.$photo->image}}" alt="" height="150px" width="150px"></td>
                    <td>
                        <form action="{{'/admin/photos/'.$photo->id}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                    <td><button>Edit</button></td>
                </tr> 
            @endforeach
        </table>
 </div>
</body>
</html>