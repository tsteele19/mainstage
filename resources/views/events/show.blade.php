@extends('layouts.app')

@section('content')
<div class="space-y-6">

    {{-- Header --}}
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-white">
                {{ $event->name }}
            </h1>

            <p class="mt-1 text-sm text-slate-400">
                {{ ucfirst($event->status) }}
            </p>
        </div>

        <div class="flex gap-2">
            <a href="{{ route('events.edit', $event) }}"
               class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-500">
                Edit Festival
            </a>

            <a href="{{ route('events.index') }}"
               class="rounded-lg border border-slate-600 px-4 py-2 text-sm text-slate-300 hover:bg-slate-700">
                Back
            </a>
        </div>
    </div>

    {{-- Festival Details --}}
    <div class="rounded-lg border border-slate-700 bg-slate-800">
        <div class="border-b border-slate-700 px-6 py-4">
            <h2 class="font-semibold text-white">Festival Details</h2>
        </div>

        <div class="grid gap-4 p-6 md:grid-cols-2">
            <div>
                <p class="text-xs uppercase tracking-wide text-slate-400">Type</p>
                <p class="mt-1 text-white">{{ ucfirst($event->type) }}</p>
            </div>

            <div>
                <p class="text-xs uppercase tracking-wide text-slate-400">Status</p>
                <p class="mt-1 text-white">{{ ucfirst($event->status) }}</p>
            </div>

            <div>
                <p class="text-xs uppercase tracking-wide text-slate-400">Start Date</p>
                <p class="mt-1 text-white">
                    {{ $event->starts_at?->format('F j, Y') }}
                </p>
            </div>

            <div>
                <p class="text-xs uppercase tracking-wide text-slate-400">Duration</p>
                <p class="mt-1 text-white">
                    {{ $event->duration }} Day{{ $event->duration != 1 ? 's' : '' }}
                </p>
            </div>

            <div class="md:col-span-2">
                <p class="text-xs uppercase tracking-wide text-slate-400">Description</p>

                <p class="mt-1 text-slate-300">
                    {{ $event->bio ?: 'No description provided.' }}
                </p>
            </div>
        </div>
    </div>

    {{-- Venue --}}
    <div class="rounded-lg border border-slate-700 bg-slate-800">
        <div class="flex items-center justify-between border-b border-slate-700 px-6 py-4">
            <h2 class="font-semibold text-white">Venue</h2>

            <a href="{{ route('events.venues.index', $event) }}"
            class="rounded-lg bg-indigo-600 px-3 py-2 text-sm font-medium text-white hover:bg-indigo-500">
                {{ $event->venue ? 'Change Venue' : 'Select Venue' }}
            </a>
        </div>

        <div class="p-6">
            @if($event->venue)

                <div class="space-y-2">
                    <p class="text-lg font-medium text-white">
                        {{ $event->venue->name }}
                    </p>

                    <p class="text-slate-400">
                        {{ $event->venue->city }},
                        {{ $event->venue->state }}
                    </p>

                    <p class="text-slate-400">
                        Capacity: {{ number_format($event->venue->capacity) }}
                    </p>
                </div>

            @else

                <p class="text-slate-400">
                    No venue selected yet.
                </p>

            @endif
        </div>
    </div>

    {{-- Lineup --}}
    <div class="rounded-lg border border-slate-700 bg-slate-800">
        <div class="flex items-center justify-between border-b border-slate-700 px-6 py-4">
            <h2 class="font-semibold text-white">Lineup</h2>

            <span class="text-sm text-slate-400">
                Coming in #11
            </span>
        </div>

        <div class="p-6">
            <p class="text-slate-400">
                No artists booked yet.
            </p>
        </div>
    </div>

    {{-- Financials --}}
    <div class="rounded-lg border border-slate-700 bg-slate-800">
        <div class="border-b border-slate-700 px-6 py-4">
            <h2 class="font-semibold text-white">Financial Overview</h2>
        </div>

        <div class="grid gap-4 p-6 md:grid-cols-3">

            <div>
                <p class="text-xs uppercase tracking-wide text-slate-400">
                    Revenue
                </p>

                <p class="mt-1 text-white">
                    ${{ number_format($event->revenue, 2) }}
                </p>
            </div>

            <div>
                <p class="text-xs uppercase tracking-wide text-slate-400">
                    Profit
                </p>

                <p class="mt-1 text-white">
                    ${{ number_format($event->profit, 2) }}
                </p>
            </div>

            <div>
                <p class="text-xs uppercase tracking-wide text-slate-400">
                    Expected Attendance
                </p>

                <p class="mt-1 text-white">
                    {{ number_format($event->expected_attendance) }}
                </p>
            </div>

        </div>
    </div>

    {{-- Performance --}}
    <div class="rounded-lg border border-slate-700 bg-slate-800">
        <div class="border-b border-slate-700 px-6 py-4">
            <h2 class="font-semibold text-white">Performance Metrics</h2>
        </div>

        <div class="grid gap-4 p-6 md:grid-cols-3">

            <div>
                <p class="text-xs uppercase tracking-wide text-slate-400">
                    Prestige
                </p>

                <p class="mt-1 text-white">
                    {{ $event->prestige }}
                </p>
            </div>

            <div>
                <p class="text-xs uppercase tracking-wide text-slate-400">
                    Fan Satisfaction
                </p>

                <p class="mt-1 text-white">
                    {{ $event->fan_satisfaction }}
                </p>
            </div>

            <div>
                <p class="text-xs uppercase tracking-wide text-slate-400">
                    Actual Attendance
                </p>

                <p class="mt-1 text-white">
                    {{ number_format($event->actual_attendance) }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
