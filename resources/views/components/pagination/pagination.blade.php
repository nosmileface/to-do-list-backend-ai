@props(['paginator'])

@if ($paginator->hasPages())
    <div class="mt-8 flex flex-col items-center justify-between gap-4
                rounded-2xl border border-slate-100 bg-white
                px-5 py-4 sm:flex-row">

        <p class="text-sm text-slate-500">
            Показано с
            <span class="font-semibold text-slate-800">
                {{ $paginator->firstItem() }}
            </span>
            по
            <span class="font-semibold text-slate-800">
                {{ $paginator->lastItem() }}
            </span>
            из
            <span class="font-semibold text-slate-800">
                {{ $paginator->total() }}
            </span>
            задач
        </p>

        <div class="flex items-center gap-2">

            @if ($paginator->onFirstPage())
                <span class="btn btn-soft cursor-not-allowed opacity-40">
                    ←
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                   class="btn btn-soft">
                    ←
                </a>
            @endif

            @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span class="btn btn-primary">
                        {{ $page }}
                    </span>
                @else
                    <a href="{{ $url }}" class="btn btn-soft">
                        {{ $page }}
                    </a>
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                   class="btn btn-soft">
                    →
                </a>
            @else
                <span class="btn btn-soft cursor-not-allowed opacity-40">
                    →
                </span>
            @endif

        </div>
    </div>
@endif
