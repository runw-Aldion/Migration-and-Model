@extends('layouts.app')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<h1 class="text-2xl font-bold mb-6">Create Task</h1>

<form action="/tasks" method="POST" class="space-y-4">
    @csrf

    <div>
        <label class="block mb-1 font-semibold">Title</label>
        <input type="text" name="title" class="w-full border p-2 rounded">
    </div>

    <div>
        <label class="block mb-1 font-semibold">Description</label>
        <textarea name="description" class="w-full border p-2 rounded"></textarea>
    </div>

    <button>
        <a href="/tasks" type="submit" class="bg-green-500 text-white px-4 py-2 rounded">    
            Save
        </a>
    </button>
</form>

<a href="/tasks" class="inline-block mt-4 text-blue-600">Back</a>

@endsection