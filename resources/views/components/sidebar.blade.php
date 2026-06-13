<aside class="w-64 h-screen bg-slate-950 border-r border-slate-800 flex flex-col shrink-0">
    {{-- Brand --}}
    <div class="px-6 py-5 border-b border-slate-800">
        <h1 class="text-2xl font-bold text-white tracking-wide">
            Mainstage
        </h1>
    </div>

    {{-- Main Nav --}}
    <nav class="flex-1 px-4 py-6 space-y-2">
        <p class="px-4 mb-2 text-xs uppercase tracking-wider text-slate-500">
            Festival Ops
        </p>

        {{-- Dashboard --}}
        <a href="{{ route('dashboard') }}"
            class="flex items-center px-4 py-3 rounded-xl transition
            {{ request()->routeIs('dashboard')
                    ? 'bg-slate-800 text-cyan-400 font-medium border-l-4 border-cyan-400'
                    : 'text-slate-200 hover:bg-slate-800' }}">
                Dashboard
        </a>

        {{-- Festivals --}}
        <a href="#"
           class="flex items-center px-4 py-3 rounded-xl text-slate-200 hover:bg-slate-800 transition">
            Festivals
        </a>

        {{-- Venues --}}
        <a href="{{ route('venues.index') }}"
        class="flex items-center px-4 py-3 rounded-xl transition
        {{ request()->routeIs('venues.*')
                ? 'bg-slate-800 text-cyan-400 font-medium border-l-4 border-cyan-400'
                : 'text-slate-200 hover:bg-slate-800' }}">
            Venues
        </a>

        {{-- Talent --}}
        <a href="#"
           class="flex items-center px-4 py-3 rounded-xl text-slate-200 hover:bg-slate-800 transition">
            Talent
        </a>

        {{-- Staff --}}
        <a href="#"
           class="flex items-center px-4 py-3 rounded-xl text-slate-200 hover:bg-slate-800 transition">
            Staff
        </a>

        {{-- Finance --}}
        <a href="#"
           class="flex items-center px-4 py-3 rounded-xl text-slate-200 hover:bg-slate-800 transition">
            Finance
        </a>

        {{-- System --}}
        <div class="pt-6">
            <p class="px-4 mb-2 text-xs uppercase tracking-wider text-slate-500">
                System
            </p>

            {{-- Reports --}}
            <a href="#"
               class="flex items-center px-4 py-3 rounded-xl text-slate-200 hover:bg-slate-800 transition">
                Reports
            </a>

            {{-- Settings --}}
            <a href="#"
               class="flex items-center px-4 py-3 rounded-xl text-slate-200 hover:bg-slate-800 transition">
                Settings
            </a>
        </div>
    </nav>

    {{-- Footer --}}
    <div class="px-6 py-4 border-t border-slate-800 text-xs text-slate-500 text-center">
        Mainstage v0.1
    </div>
</aside>
