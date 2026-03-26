@extends('layouts.app')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<h1 class="text-6xl font-bold text-red-500 mb-6">TAILWIND TEST</h1>
@if(session('success'))
    <p class="mb-4 text-green-600">{{ session('success') }}</p>
@endif

<a href="/tasks/create" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
    Create New Task
</a>

<ul class="space-y-4">
    @forelse($tasks as $task)
        <li class="border p-4 rounded bg-gray-50">
            <strong class="text-lg">{{ $task->title }}</strong>
            <p>{{ $task->description }}</p>

            <p class="mt-2">
                Status:
                <span class="{{ $task->is_completed ? 'text-green-600' : 'text-yellow-600' }}">
                    {{ $task->is_completed ? 'Completed' : 'Pending' }}
                </span>
            </p>

            <div class="mt-3 space-x-2">
                <a href="/tasks/{{ $task->id }}" class="text-blue-600">View</a>
                <a href="/tasks/{{ $task->id }}/edit" class="text-yellow-600">Edit</a>

                <form action="/tasks/{{ $task->id }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600">Delete</button>
                </form>
            </div>
        </li>
    @empty
        <p>No tasks found.</p>
    @endforelse
</ul>

@endsection