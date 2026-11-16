@extends('layouts.app')

@section('title', $title)

@section('content')
    <a href="{{ route('tasks.index') }}" class="text-sm font-semibold text-slate-500 hover:text-brand">← К списку задач</a>
    <h1 class="mb-2 mt-6 text-3xl font-extrabold">Редактировать задачу - ID: {{ $task->id }}</h1><p class="mb-8 text-slate-500">Обновите детали, чтобы план оставался актуальным.</p>
    @include('tasks._form', ['action' => route('tasks.update', $task->id), 'method' => 'PUT', 'submitText' => 'Сохранить изменения', 'task' => $task])
@endsection
