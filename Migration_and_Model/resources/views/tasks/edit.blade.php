@extends('layouts.app')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<h1 class="text-2xl font-bold mb-6">Edit Task</h1>

<form action="/tasks/{{ $task->id }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')

    <div>
        <label class="block mb-1 font-semibold">Title</label>
        <input type="text" name="title" value="{{ $task->title }}" class="w-full border p-2 rounded">
    </div>

    <div>
        <label class="block mb-1 font-semibold">Description</label>
        <textarea name="description" class="w-full border p-2 rounded">{{ $task->description }}</textarea>
    </div>

    <div>
        <label class="inline-flex items-center">
            <input type="checkbox" name="is_completed" value="1" {{ $task->is_completed ? 'checked' : '' }} class="mr-2">
            Completed
        </label>
    </div>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
        Update Task
    </button>
</form>

<a href="/tasks" class="inline-block mt-4 text-blue-600">Back</a>

@endsection