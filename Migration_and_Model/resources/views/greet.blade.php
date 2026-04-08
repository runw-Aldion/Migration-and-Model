@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto bg-white rounded-2xl p-10 text-center">

    <!-- Title -->
    <h2 class="text-4xl font-bold text-slate-800 mb-3">
        Hi! Welcome 
    </h2>

    <!-- Action Button -->
    <a href="/tasks"
       class="inline-block bg-sky-600 text-white px-6 py-3 rounded-xl shadow hover:bg-sky-700 transition duration-200">
        Go to Task List
    </a>

</div>

@endsection