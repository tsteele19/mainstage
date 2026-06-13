@extends('layouts.app')

@section('content')
    {{-- Header --}}
    <div class="mb-6">
        <a
            href="{{ route('venues.index') }}"
            class="text-sm text-sky-400 hover:text-sky-300"
        >
            ← Back to Venues
        </a>

        <h1 class="mt-2 text-3xl font-bold">
            {{ $venue->name }}
        </h1>

        <p class="mt-1 text-slate-400">
            {{ $venue->city }}, {{ $venue->state }}, {{ $venue->country }}
        </p>
    </div>

    {{-- Bio --}}
    @if($venue->bio)
        <div class="mb-6 rounded-lg border border-slate-700 bg-slate-800 p-6">
            <p class="text-slate-300">
                {{ $venue->bio }}
            </p>
        </div>
    @endif

    {{-- Main Content --}}
    <div class="grid gap-6 lg:grid-cols-2">

        {{-- Venue Details --}}
        <div class="rounded-lg border border-slate-700 bg-slate-800">
            <div class="border-b border-slate-700 px-6 py-4">
                <h2 class="font-semibold">Venue Details</h2>
            </div>

            <div class="space-y-4 p-6">
                {{-- City --}}
                <div class="flex justify-between">
                    <span class="text-slate-400">City</span>
                    <span>{{ $venue->city }}</span>
                </div>

                {{-- State --}}
                <div class="flex justify-between">
                    <span class="text-slate-400">State</span>
                    <span>{{ $venue->state }}</span>
                </div>

                {{-- Country --}}
                <div class="flex justify-between">
                    <span class="text-slate-400">Country</span>
                    <span>{{ $venue->country }}</span>
                </div>

                {{-- Type --}}
                <div class="border-t border-slate-700 pt-4">
                    <div class="flex justify-between">
                        <span class="text-slate-400">Type</span>
                        <span>{{ Str::title($venue->type) }}</span>
                    </div>
                </div>

                {{-- Tier --}}
                <div class="flex justify-between">
                    <span class="text-slate-400">Tier</span>
                    <span>{{ Str::title($venue->tier) }}</span>
                </div>

                {{-- Capacity --}}
                <div class="flex justify-between">
                    <span class="text-slate-400">Capacity</span>
                    <span>{{ number_format($venue->capacity) }}</span>
                </div>

                {{-- Max Stages --}}
                <div class="flex justify-between">
                    <span class="text-slate-400">Max Stages</span>
                    <span>{{ $venue->max_stages }}</span>
                </div>

                {{-- Curfew --}}
                <div class="flex justify-between">
                    <span class="text-slate-400">Curfew Hour</span>
                    <span>{{ $venue->curfew_hour }}:00</span>
                </div>

                {{-- Active/Inactive --}}
                <div class="flex justify-between">
                    <span class="text-slate-400">Active</span>

                    @if($venue->is_active)
                        <span class="rounded-full bg-green-500/20 px-3 py-1 text-xs font-semibold text-green-400">
                            Active
                        </span>
                    @else
                        <span class="rounded-full bg-red-500/20 px-3 py-1 text-xs font-semibold text-red-400">
                            Inactive
                        </span>
                    @endif
                </div>
            </div>
        </div>

        {{-- Right Column --}}
        <div class="space-y-6">

            {{-- Financial Information --}}
            <div class="rounded-lg border border-slate-700 bg-slate-800">
                <div class="border-b border-slate-700 px-6 py-4">
                    <h2 class="font-semibold">Financial Information</h2>
                </div>

                <div class="space-y-4 p-6">
                    {{-- Rental Cost --}}
                    <div class="flex justify-between">
                        <span class="text-slate-400">Rental Cost</span>
                        <span>${{ number_format($venue->rental_cost) }}</span>
                    </div>

                    {{-- Maintenance Cost --}}
                    <div class="flex justify-between">
                        <span class="text-slate-400">Maintenance Cost</span>
                        <span>${{ number_format($venue->maintenance_cost) }}</span>
                    </div>
                </div>
            </div>

            {{-- Ratings & Restrictions --}}
            <div class="rounded-lg border border-slate-700 bg-slate-800">
                <div class="border-b border-slate-700 px-6 py-4">
                    <h2 class="font-semibold">Ratings & Restrictions</h2>
                </div>

                <div class="space-y-4 p-6">
                    {{-- Prestige --}}
                    <div class="flex justify-between">
                        <span class="text-slate-400">Prestige</span>
                        <span>{{ $venue->prestige }}/100</span>
                    </div>

                    {{-- Parking Rating --}}
                    <div class="flex justify-between">
                        <span class="text-slate-400">Parking Rating</span>
                        <span>{{ $venue->parking_rating }}/100</span>
                    </div>

                    {{-- Weather Exposure --}}
                    <div class="flex justify-between">
                        <span class="text-slate-400">Weather Exposure</span>
                        <span>{{ $venue->weather_exposure }}/100</span>
                    </div>

                    {{-- Noise Restriction --}}
                    <div class="flex justify-between">
                        <span class="text-slate-400">Noise Restriction</span>

                        @if($venue->noise_restriction)
                            <span class="rounded-full bg-yellow-500/20 px-3 py-1 text-xs font-semibold text-yellow-400">
                                Restricted
                            </span>
                        @else
                            <span class="rounded-full bg-green-500/20 px-3 py-1 text-xs font-semibold text-green-400">
                                None
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
