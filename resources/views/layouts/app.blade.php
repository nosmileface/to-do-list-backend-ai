<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Taskflow') — Taskflow</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { theme: { extend: { fontFamily: { sans: ['Inter', 'ui-sans-serif', 'system-ui'] }, colors: { ink: '#17233d', brand: '#635bff' } } } }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body{background:#f7f8fc} .field{width:100%;border:1px solid #e2e6ef;border-radius:14px;padding:12px 15px;background:#fff;outline:none;transition:.2s} .field:focus{border-color:#635bff;box-shadow:0 0 0 4px #635bff1a}.btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;border-radius:13px;padding:11px 17px;font-weight:600;transition:.2s}.btn-primary{background:#635bff;color:white}.btn-primary:hover{background:#5148e8}.btn-soft{background:#f1f2fa;color:#35415b}.btn-soft:hover{background:#e8eaf5}.card{background:#fff;border:1px solid #edf0f5;border-radius:22px;box-shadow:0 10px 30px #1b245008}</style>
</head>
<body class="min-h-screen font-sans text-ink antialiased">

@auth
    <header class="border-b border-slate-100 bg-white/90">
        <div class="mx-auto flex max-w-6xl items-center justify-between px-5 py-4">
            <a href="{{ route('tasks.index') }}" class="flex items-center gap-3 text-xl font-extrabold tracking-tight"><span class="grid h-10 w-10 place-items-center rounded-2xl bg-brand text-white">✓</span> Taskflow<span class="text-brand">.</span></a>
            <div class="flex items-center gap-3 sm:gap-6">
                <span class="hidden text-sm text-slate-500 sm:block">{{ auth()->user()->name ?? auth()->user()->email }}</span>
                <form action="{{ route('logout') }}" method="POST">@csrf<button class="text-sm font-semibold text-slate-500 hover:text-brand">Выйти →</button></form>
            </div>
        </div>
    </header>
@endauth

<main class="mx-auto max-w-6xl px-5 py-10 sm:py-14">

    @if(session('success'))
        <div
            id="success-alert"
            role="status"
            class="relative mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4 pr-12 text-emerald-700"
        >
            <div class="flex items-center gap-3">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="20"
                    height="20"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="shrink-0"
                >
                    <path d="M20 6 9 17l-5-5"/>
                </svg>

                <p class="text-sm font-medium">
                    {{ session('success') }}
                </p>
            </div>

            <button
                type="button"
                onclick="this.closest('[role=status]').remove()"
                class="absolute right-4 top-1/2 flex h-8 w-8 -translate-y-1/2 items-center justify-center rounded-lg text-emerald-500 transition hover:bg-emerald-100 hover:text-emerald-700"
                aria-label="Закрыть уведомление"
                title="Закрыть"
            >
                ✕
            </button>
        </div>
    @endif


    @yield('content')
</main>
</body>
</html>
