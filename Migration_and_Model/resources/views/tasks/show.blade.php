@extends('layouts.app')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<h1 class="text-2xl font-bold mb-4">Task Details</h1>

<div class="border p-4 rounded bg-gray-50">
    <p><strong>Title:</strong> {{ $task->title }}</p>

    <p class="mt-2"><strong>Description:</strong> {{ $task->description }}</p>

    <p class="mt-2">
        <strong>Status:</strong>
        <span class="{{ $task->is_completed ? 'text-green-600' : 'text-yellow-600' }}">
            {{ $task->is_completed ? 'Completed' : 'Pending' }}
        </span>
    </p>
</div>

<div class="mt-4 space-x-3">
    <a href="/tasks" class="text-blue-600">Back</a>
    <a href="/tasks/{{ $task->id }}/edit" class="text-yellow-600">Edit</a>
</div>

@endsection