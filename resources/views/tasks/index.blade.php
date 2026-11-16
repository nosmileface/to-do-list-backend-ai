
@extends('layouts.app')

@section('title', 'Мои задачи')

@section('content')
    <div class="mb-9 flex flex-wrap items-end justify-between gap-5">
        <div>
            <p class="mb-2 text-sm font-semibold text-brand">МОЁ ПРОСТРАНСТВО</p>
            <h1 class="text-3xl font-extrabold tracking-tight sm:text-4xl">
                Мои задачи <span class="text-slate-300">✦</span>
            </h1>
            <p class="mt-2 text-slate-500">Держите всё важное под контролем.</p>
        </div>

        <a class="btn btn-primary" href="{{ route('tasks.create') }}">
            <span class="text-xl leading-none">+</span> Новая задача
        </a>
    </div>

    <div class="mb-6 grid gap-4 sm:grid-cols-3">
        <div class="card p-5">
            <p class="text-sm text-slate-500">Всего задач</p>
            <p class="mt-2 text-3xl font-extrabold">{{ $tasksCount }}</p>
        </div>

        <div class="card p-5">
            <p class="text-sm text-slate-500">В работе</p>
            <p class="mt-2 text-3xl font-extrabold text-brand">
                {{ $tasksCountNotActive }}
            </p>
        </div>

        <div class="card p-5">
            <p class="text-sm text-slate-500">Выполнено</p>
            <p class="mt-2 text-3xl font-extrabold text-emerald-600">
                {{ $tasksCountActive }}
            </p>
        </div>
    </div>

    @if($tasks->isEmpty())
        <div class="card py-20 text-center">
            <div class="mx-auto mb-5 grid h-20 w-20 place-items-center rounded-3xl bg-indigo-50 text-4xl text-brand">☑</div>
            <h2 class="text-xl font-bold">Пока нет задач</h2>
            <p class="mt-2 text-slate-500">Создайте первую задачу — и начнём!</p>
            <a class="btn btn-primary mt-6" href="{{ route('tasks.create') }}">
                + Создать задачу
            </a>
        </div>
    @else
        <div class="space-y-3">
            @foreach($tasks as $task)
                <article class="card flex flex-col justify-between gap-4 p-5 transition hover:border-indigo-200 sm:flex-row sm:items-center">

                    <div class="flex min-w-0 items-start gap-4">
                        <div class="mt-1 grid h-10 w-10 shrink-0 place-items-center rounded-xl
                            {{ $task->is_completed
                                ? 'bg-emerald-100 text-emerald-600'
                                : 'bg-indigo-50 text-brand' }}">
                            ✓
                        </div>

                        <div class="min-w-0">
                            <a href="{{ route('tasks.show', $task->id) }}"
                               class="break-words text-lg font-bold hover:text-brand
                               {{ $task->is_completed ? 'text-slate-400 line-through' : '' }}">
                                {{ $task->title }}
                            </a>

                            <p class="mt-1 line-clamp-2 break-words text-sm text-slate-500">
                                {{ $task->description ?: 'Без описания' }}
                            </p>

                            <p class="mt-2 text-xs text-slate-400">
                                Создано {{ $task->created_at?->format('d.m.Y') }}
                            </p>

                            @if($task->is_completed)
                                <span class="mt-2 inline-block rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-600">
                                    ✓ Выполнена
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="flex shrink-0 flex-wrap items-center gap-2 pl-14 sm:pl-0">

                        @if(!$task->is_completed)
                            <form method="POST" action="{{ route('tasks.toggle', $task->id) }}">
                                @csrf
                                @method('PUT')

                                <button type="submit"
                                        class="btn bg-emerald-50 text-sm text-emerald-600 hover:bg-emerald-100">
                                    ✓ Выполнить
                                </button>
                            </form>
                        @endif

                        <a href="{{ route('tasks.show', $task->id) }}"
                           class="btn btn-soft text-sm">
                            Открыть
                        </a>

                        <a href="{{ route('tasks.edit', $task->id) }}"
                           class="btn btn-soft text-sm">
                            Изменить
                        </a>

                        <form method="POST"
                              action="{{ route('tasks.destroy', $task->id) }}"
                              onsubmit="return confirm('Удалить задачу без возможности восстановления?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn bg-rose-50 text-sm text-rose-600 hover:bg-rose-100"
                                    aria-label="Удалить задачу">
                                ✕
                            </button>
                        </form>
                    </div>
                </article>
            @endforeach
        </div>

        @if($tasks instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator)
            <x-pagination :paginator="$tasks" />
        @endif
    @endif
@endsection
