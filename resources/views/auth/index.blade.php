
@extends('layouts.app')

@section('title', 'Вход')

@section('content')
    @php
        $hasAuthErrors = $errors->has('email') || $errors->has('password');
    @endphp

    <div class="mx-auto grid min-h-[70vh] max-w-5xl items-center gap-12 lg:grid-cols-2">

        <section class="hidden lg:block">

            <div class="mb-7 inline-flex rounded-full bg-indigo-50 px-4 py-2 text-sm font-semibold text-brand">
                ✦ Пространство для продуктивности
            </div>

            <h1 class="text-5xl font-extrabold leading-tight tracking-tight">
                Все задачи.<br>
                <span class="text-brand">Один ясный план.</span>
            </h1>

            <p class="mt-6 max-w-md text-lg leading-8 text-slate-500">
                Организуйте дела, сохраняйте фокус и двигайтесь
                к своим целям без лишнего шума.
            </p>

            <div class="mt-10 grid max-w-sm grid-cols-2 gap-4">

                <div class="card p-5">
                    <div class="text-3xl">◎</div>

                    <p class="mt-3 font-bold">
                        Фокус
                    </p>

                    <p class="mt-1 text-sm text-slate-500">
                        Только важное
                    </p>
                </div>

                <div class="card p-5">
                    <div class="text-3xl">✦</div>

                    <p class="mt-3 font-bold">
                        Порядок
                    </p>

                    <p class="mt-1 text-sm text-slate-500">
                        Всё под контролем
                    </p>
                </div>

            </div>
        </section>

        <section class="card mx-auto w-full max-w-md p-7 sm:p-10">

            <div class="mb-8 flex items-center gap-3 lg:hidden">
                <span class="grid h-10 w-10 place-items-center rounded-xl bg-brand text-white">
                    ✓
                </span>

                <strong class="text-xl">
                    Taskflow.
                </strong>
            </div>

            <h2 class="text-3xl font-extrabold tracking-tight">
                С возвращением 👋
            </h2>

            <p class="mt-2 text-sm text-slate-500">
                Войдите, чтобы продолжить работу с задачами.
            </p>

            <form
                method="POST"
                action="{{ route('login.login') }}"
                class="mt-8 space-y-5"
            >
                @csrf

                <div>
                    <label
                        for="email"
                        class="mb-2 block text-sm font-semibold"
                    >
                        Электронная почта
                    </label>

                    <input
                        id="email"
                        name="email"
                        type="email"
                        autocomplete="email"
                        required
                        value="{{ old('email') }}"
                        placeholder="you@example.com"
                        class="field {{ $hasAuthErrors ? '!border-rose-400 focus:!border-rose-500 focus:!ring-rose-100' : '' }}"
                        aria-invalid="{{ $hasAuthErrors ? 'true' : 'false' }}"
                    >
                </div>

                <div>
                    <label
                        for="password"
                        class="mb-2 block text-sm font-semibold"
                    >
                        Пароль
                    </label>

                    <input
                        id="password"
                        name="password"
                        type="password"
                        autocomplete="current-password"
                        required
                        placeholder="Введите пароль"
                        class="field {{ $hasAuthErrors ? '!border-rose-400 focus:!border-rose-500 focus:!ring-rose-100' : '' }}"
                        aria-invalid="{{ $hasAuthErrors ? 'true' : 'false' }}"
                    >
                </div>

                <button
                    type="submit"
                    class="btn btn-primary w-full py-3.5"
                >
                    Войти в аккаунт
                    <span aria-hidden="true">→</span>
                </button>

            </form>

            <p class="mt-7 text-center text-xs text-slate-400">
                Ваши задачи доступны только вам
            </p>

        </section>
    </div>
@endsection
