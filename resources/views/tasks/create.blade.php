@extends('layouts.app')

@section('title', 'Новая задача')

@section('content')
    <a href="{{ route('tasks.index') }}" class="text-sm font-semibold text-slate-500 hover:text-brand">← К списку задач</a>
    <h1 class="mb-2 mt-6 text-3xl font-extrabold">Новая задача ✨</h1><p class="mb-8 text-slate-500">Запишите идею и превратите её в конкретное дело.</p>
    @include('tasks._form', ['action' => route('tasks.store'), 'method' => 'POST', 'submitText' => 'Создать задачу'])
@endsection
