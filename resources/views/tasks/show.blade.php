@extends('layouts.app')

@section('title', $title)

@section('content')
    <a href="{{ route('tasks.index') }}" class="text-sm font-semibold text-slate-500 hover:text-brand">← К списку задач</a>
    <article class="card mt-7 max-w-3xl p-7 sm:p-10">
        <div class="mb-6 flex flex-wrap items-start justify-between gap-4"><div><p class="mb-2 text-xs font-bold uppercase tracking-widest text-brand">Детали задачи - ID: {{ $task->id }}</p><h1 class="break-words text-3xl font-extrabold">{{ $task->title }}</h1></div><span class="rounded-full bg-indigo-50 px-3 py-1.5 text-xs font-semibold text-brand">Задача</span></div>
        <div class="border-t border-slate-100 pt-6"><h2 class="mb-3 text-sm font-bold">Описание</h2><p class="whitespace-pre-line break-words leading-7 text-slate-600">{{ $task->description ?: 'Описание пока не добавлено.' }}</p></div>
        <p class="mt-8 text-xs text-slate-400">Создано: {{ $task->created_at?->format('d.m.Y H:i') }}</p>
        <div class="mt-7 flex flex-wrap gap-3 border-t border-slate-100 pt-6"><a class="btn btn-primary" href="{{ route('tasks.edit', $task->id) }}">Редактировать</a><form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Вы точно хотите удалить задачу?')">@csrf @method('DELETE')<button type="submit" class="btn bg-rose-50 text-rose-600 hover:bg-rose-100">Удалить</button></form></div>
    </article>
@endsection
