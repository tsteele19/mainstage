@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div>
        <h1 class="text-3xl font-bold">{{ $promoter->name }}</h1>

        @if ($promoter->bio)
            <p class="mt-2 text-slate-400">
                {{ $promoter->bio }}
            </p>
        @endif
    </div>

    {{-- Company Summary --}}
    <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
        <div class="rounded-lg bg-slate-800 p-4">
            <p class="text-sm text-slate-400">Current Cash</p>
            <p class="text-2xl font-bold">
                ${{ number_format($promoter->current_cash, 2) }}
            </p>
        </div>

        <div class="rounded-lg bg-slate-800 p-4">
            <p class="text-sm text-slate-400">Reputation</p>
            <p class="text-2xl font-bold">
                {{ $promoter->reputation }}
            </p>
        </div>

        <div class="rounded-lg bg-slate-800 p-4">
            <p class="text-sm text-slate-400">Experience</p>
            <p class="text-2xl font-bold">
                {{ $promoter->experience }}
            </p>
        </div>

        <div class="rounded-lg bg-slate-800 p-4">
            <p class="text-sm text-slate-400">Status</p>
            <p class="text-2xl font-bold capitalize">
                {{ $promoter->status }}
            </p>
        </div>
    </div>

    {{-- Company Details --}}
    <div class="rounded-lg bg-slate-800 p-6">
        <h2 class="mb-4 text-xl font-bold">Company Details</h2>

        <dl class="space-y-2">
            <div>
                <dt class="text-slate-400">Type</dt>
                <dd>{{ ucfirst($promoter->type) }}</dd>
            </div>

            <div>
                <dt class="text-slate-400">Founded</dt>
                <dd>
                    {{ optional($promoter->founded_at)->format('F j, Y') }}
                </dd>
            </div>
        </dl>
    </div>

    {{-- Placeholder --}}
    <div class="rounded-lg bg-slate-800 p-6">
        <h2 class="mb-4 text-xl font-bold">Upcoming Features</h2>

        <ul class="list-disc pl-6 text-slate-300">
            <li>Festival Management</li>
            <li>Talent Booking</li>
            <li>Venue Management</li>
            <li>Financial Reports</li>
        </ul>
    </div>
</div>
@endsection
