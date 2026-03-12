<!DOCTYPE html>
<html>
<head>
    <title>Tasks</title>
</head>
<body>
    <h1>Task List</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="/tasks/create">Create New Task</a>

    <ul>
        @forelse($tasks as $task)
            <li>
                <strong>{{ $task->title }}</strong>
                - {{ $task->is_completed ? 'Completed' : 'Pending' }}
                <br>
                {{ $task->description }}
                <br>
                <a href="/tasks/{{ $task->id }}">View</a>
                <a href="/tasks/{{ $task->id }}/edit">Edit</a>

                <form action="/tasks/{{ $task->id }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
            <hr>
        @empty
            <p>No tasks found.</p>
        @endforelse
    </ul>
</body>
</html>