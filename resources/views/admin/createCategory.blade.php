<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>add new category</title>
</head>
<body>
    <h2>Create a new category</h2>
    <form action="{{ route('category.store') }}" method="POST">
        @csrf

        <div class="form-group">
          <select class="form-control" name="parent_id">
            <option value="">Select Parent Category</option>

            @foreach ($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Category Name" required>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary">Create</button>
        </div>
      </form>
    
</body>
</html>