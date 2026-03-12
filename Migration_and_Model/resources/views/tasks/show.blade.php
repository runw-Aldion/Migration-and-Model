<h1>Task Details</h1>

<p><strong>Title:</strong> {{ $task->title }}</p>
<p><strong>Description:</strong> {{ $task->description }}</p>
<p><strong>Status:</strong> {{ $task->is_completed ? 'Completed' : 'Pending' }}</p>

<a href="/tasks">Back</a>
<a href="/tasks/{{ $task->id }}/edit">Edit</a>