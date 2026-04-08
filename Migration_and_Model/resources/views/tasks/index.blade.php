@extends('layouts.app')

@section('content')

<!-- Header -->
<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-3xl font-bold text-slate-800">Task List</h1>
    </div>

    <a href="/tasks/create"
       class="bg-sky-600 text-white px-4 py-2 rounded-lg shadow hover:bg-sky-700 transition">
        + Create Task
    </a>
</div>

<!-- Success Message -->
@if(session('success'))
    <div class="mb-6 bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-lg">
        {{ session('success') }}
    </div>
@endif

<!-- Task List -->
<div class="space-y-4">
    @forelse($tasks as $task)
        <div class="bg-white border border-slate-200 rounded-xl shadow p-5">

            <!-- Title + Status -->
            <div class="flex items-start justify-between">
                <div>
                    <h2 class="text-lg font-semibold text-slate-800">
                        {{ $task->title }}
                    </h2>
                    <p class="text-slate-500 mt-1">
                        {{ $task->description ?: 'No description provided.' }}
                    </p>
                </div>
                <form action="{{ route('tasks.toggle', $task->id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <button type="submit"
                        class="text-sm font-medium px-3 py-1 rounded-full transition cursor-pointer
                        {{ $task->is_completed 
                            ? 'bg-green-100 text-green-700 hover:bg-green-200' 
                            : 'bg-yellow-100 text-yellow-700 hover:bg-yellow-200' }}">
                        {{ $task->is_completed ? 'Completed' : 'Pending' }}
                    </button>
                </form>
            </div>

            <!-- Actions -->
            <div class="mt-5 flex items-center gap-3">

                <a href="/tasks/{{ $task->id }}"
                   class="px-3 py-2 rounded-lg bg-slate-100 text-slate-700 hover:bg-slate-200">
                    View
                </a>

                <a href="/tasks/{{ $task->id }}/edit"
                   class="px-3 py-2 rounded-lg bg-blue-100 text-blue-700 hover:bg-blue-200">
                    Edit
                </a>

                <form action="/tasks/{{ $task->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-3 py-2 rounded-lg bg-red-100 text-red-700 hover:bg-red-200">
                        Delete
                    </button>
                </form>

            </div>
        </div>

    @empty
        <div class="bg-white border border-slate-200 rounded-xl shadow p-8 text-center">
            <p class="text-slate-500 text-lg">No tasks yet.</p>
        </div>
    @endforelse
</div>

@endsection