<header class="h-20 px-8 border-b border-slate-800 bg-slate-900 flex items-center justify-between shrink-0">
    {{-- Left --}}
    <div>
        <h2 class="text-2xl font-semibold text-white">
            {{ $title ?? 'Dashboard' }}
        </h2>
        <p class="text-sm text-slate-400">
            Festival Operations Overview
        </p>
    </div>

    {{-- Right --}}
    <div class="flex items-center gap-4">
        {{-- Date --}}
        <div class="px-4 py-2 rounded-xl bg-slate-800 border border-slate-700">
            <p class="text-xs uppercase tracking-wide text-slate-500">
                Date
            </p>
            <p class="text-sm font-medium text-white">
                Jan 1, 2026
            </p>
        </div>

        {{-- Funds --}}
        <div class="px-4 py-2 rounded-xl bg-slate-800 border border-slate-700">
            <p class="text-xs uppercase tracking-wide text-slate-500">
                Funds
            </p>
            <p class="text-sm font-semibold text-cyan-400">
                $250,000
            </p>
        </div>
    </div>
</header>
