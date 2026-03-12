<h1>Edit Task</h1>

<form action="{{ route('tasks.update', $task) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Title:</label><br>
    <input type="text" name="title" value="{{ $task->title }}"><br><br>

    <label>Description:</label><br>
    <textarea name="description">{{ $task->description }}</textarea><br><br>

    <label>
        <input type="checkbox" name="is_completed" value="1" {{ $task->is_completed ? 'checked' : '' }}>
        Completed
    </label><br><br>

    <button type="submit">Update</button>
</form>

<a href="{{ route('tasks.index') }}">Back</a>