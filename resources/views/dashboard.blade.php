@extends('layouts.app')

@section('content')
    <div class="space-y-8">
        {{-- Welcome --}}
        <section>
            <h1 class="text-3xl font-bold text-white">
                Welcome to Mainstage
            </h1>
            <p class="mt-2 text-slate-400">
                Build festivals, manage talent, grow your reputation, and run the ultimate event empire.
            </p>
        </section>

        {{-- Top Stats --}}
        <section class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
            <div class="rounded-2xl border border-slate-800 bg-slate-800 p-6">
                <p class="text-sm uppercase tracking-wide text-slate-500">Funds</p>
                <h2 class="mt-2 text-3xl font-bold text-cyan-400">$250,000</h2>
            </div>

            <div class="rounded-2xl border border-slate-800 bg-slate-800 p-6">
                <p class="text-sm uppercase tracking-wide text-slate-500">Reputation</p>
                <h2 class="mt-2 text-3xl font-bold text-white">45 / 100</h2>
            </div>

            <div class="rounded-2xl border border-slate-800 bg-slate-800 p-6">
                <p class="text-sm uppercase tracking-wide text-slate-500">Attendance</p>
                <h2 class="mt-2 text-3xl font-bold text-white">12,400</h2>
            </div>

            <div class="rounded-2xl border border-slate-800 bg-slate-800 p-6">
                <p class="text-sm uppercase tracking-wide text-slate-500">Staff Morale</p>
                <h2 class="mt-2 text-3xl font-bold text-white">78 / 100</h2>
            </div>
        </section>

        {{-- Main Grid --}}
        <section class="grid gap-6 lg:grid-cols-3">
            {{-- Upcoming Festivals --}}
            <div class="lg:col-span-2 rounded-2xl border border-slate-800 bg-slate-800 p-6">
                <h3 class="text-xl font-semibold text-white">Upcoming Festivals</h3>

                <div class="mt-6 space-y-4">
                    <div class="rounded-xl bg-slate-900 p-4 border border-slate-700">
                        <p class="font-medium text-white">Summer Burn Fest</p>
                        <p class="text-sm text-slate-400">Columbus • 22 Days Away</p>
                    </div>

                    <div class="rounded-xl bg-slate-900 p-4 border border-slate-700">
                        <p class="font-medium text-white">River Riot</p>
                        <p class="text-sm text-slate-400">Chicago • 41 Days Away</p>
                    </div>

                    <div class="rounded-xl bg-slate-900 p-4 border border-slate-700">
                        <p class="font-medium text-white">Midnight Voltage</p>
                        <p class="text-sm text-slate-400">Detroit • 63 Days Away</p>
                    </div>
                </div>
            </div>

            {{-- Quick Actions --}}
            <div class="rounded-2xl border border-slate-800 bg-slate-800 p-6">
                <h3 class="text-xl font-semibold text-white">Quick Actions</h3>

                <div class="mt-6 space-y-3">
                    <button class="w-full rounded-xl bg-cyan-500 px-4 py-3 font-medium text-white hover:bg-cyan-600 transition">
                        Create Festival
                    </button>

                    <button class="w-full rounded-xl bg-slate-700 px-4 py-3 font-medium text-white hover:bg-slate-600 transition">
                        Book Talent
                    </button>

                    <button class="w-full rounded-xl bg-slate-700 px-4 py-3 font-medium text-white hover:bg-slate-600 transition">
                        Review Finances
                    </button>
                </div>
            </div>
        </section>

        {{-- News / Feed --}}
        <section class="rounded-2xl border border-slate-800 bg-slate-800 p-6">
            <h3 class="text-xl font-semibold text-white">Industry Buzz</h3>

            <div class="mt-4 space-y-4 text-slate-300">
                <p>• Ticket demand rising for large outdoor venues.</p>
                <p>• Talent fees trending upward for veteran acts.</p>
                <p>• Regional sponsors showing interest in summer festivals.</p>
            </div>
        </section>
    </div>
@endsection
