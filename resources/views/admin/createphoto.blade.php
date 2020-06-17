<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>add new category</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Add new photo</h2>
        <form action="/admin/create" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="">image</label>
                <input type="file" name="image">
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <input type="text" name="descrition">
            </div>
            <div class="form-group">
            <select class="form-control" name="category">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            </div>
            <div>
                <label for="">Tags</label>
                <select id="tags" multiple name="tags[]">
                    @foreach ($tags as $tag)
                         <option value="{{ $tag->id}}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
</body>
</html>