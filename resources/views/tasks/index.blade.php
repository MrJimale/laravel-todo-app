<!DOCTYPE html>
<html>
<head>
    <title>My To-Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
      <script>
    // Reload the page every 5000 milliseconds (5 seconds)
    setInterval(function() {
      window.location.reload();
    }, 5000);
  </script>
</head>
<body class="p-5">
    <h1 class="mb-4">To-Do</h1>

    <form action="/tasks" method="POST" class="mb-3">
        @csrf
        <div class="input-group">
            <input name="title" class="form-control" placeholder="New task…" required>
            <button class="btn btn-primary">Add</button>
        </div>
        @error('title') <div class="text-danger mt-1">{{ $message }}</div> @enderror
    </form>

    <ul class="list-group">
        @foreach ($tasks as $task)
            <li class="list-group-item d-flex justify-content-between">
                {{ $task->title }}
                <form action="/tasks/{{ $task->id }}" method="POST">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger">Done</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
