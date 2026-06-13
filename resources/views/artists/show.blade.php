@extends('layouts.app')

@section('content')
    {{-- Header --}}
    <div class="mb-6">
        <a
            href="{{ route('artists.index') }}"
            class="text-sm text-sky-400 hover:text-sky-300"
        >
            ← Back to Artists
        </a>

        <h1 class="mt-2 text-3xl font-bold">
            {{ $artist->name }}
        </h1>

        <p class="mt-1 text-slate-400">
            {{ $artist->genre }} • {{ $artist->based_in }}
        </p>
    </div>

    {{-- Bio --}}
    @if($artist->bio)
        <div class="mb-6 rounded-lg border border-slate-700 bg-slate-800 p-6">
            <p class="text-slate-300">
                {{ $artist->bio }}
            </p>
        </div>
    @endif

    {{-- Main Content --}}
    <div class="grid gap-6 lg:grid-cols-2">

        {{-- Artist Details --}}
        <div class="rounded-lg border border-slate-700 bg-slate-800">
            <div class="border-b border-slate-700 px-6 py-4">
                <h2 class="font-semibold">Artist Details</h2>
            </div>

            <div class="space-y-4 p-6">
                {{-- Genre --}}
                <div class="flex justify-between">
                    <span class="text-slate-400">Genre</span>
                    <span>{{ $artist->genre }}</span>
                </div>

                {{-- Based In --}}
                <div class="flex justify-between">
                    <span class="text-slate-400">Based In</span>
                    <span>{{ $artist->based_in }}</span>
                </div>

                {{-- Career Start --}}
                <div class="flex justify-between">
                    <span class="text-slate-400">Career Start</span>
                    <span>
                        {{ $artist->career_start_at?->format('M j, Y') ?? 'Unknown' }}
                    </span>
                </div>

                {{-- Retired --}}
                <div class="flex justify-between">
                    <span class="text-slate-400">Retired</span>
                    <span>
                        {{ $artist->retired_at?->format('M j, Y') ?? 'No' }}
                    </span>
                </div>

                {{-- Active --}}
                <div class="flex justify-between">
                    <span class="text-slate-400">Active</span>

                    @if($artist->is_active)
                        <span class="rounded-full bg-green-500/20 px-3 py-1 text-xs font-semibold text-green-400">
                            Active
                        </span>
                    @else
                        <span class="rounded-full bg-red-500/20 px-3 py-1 text-xs font-semibold text-red-400">
                            Inactive
                        </span>
                    @endif
                </div>

                {{-- Requirements --}}
                <div class="border-t border-slate-700 pt-4">
                    <h3 class="mb-4 text-sm font-semibold text-slate-300">
                        Requirements
                    </h3>

                    <div class="space-y-4">
                        {{-- Full Band --}}
                        <div class="flex justify-between">
                            <span class="text-slate-400">Requires Full Band</span>

                            @if($artist->requires_full_band)
                                <span class="rounded-full bg-yellow-500/20 px-3 py-1 text-xs font-semibold text-yellow-400">
                                    Yes
                                </span>
                            @else
                                <span class="rounded-full bg-green-500/20 px-3 py-1 text-xs font-semibold text-green-400">
                                    No
                                </span>
                            @endif
                        </div>

                        {{-- Large Stage --}}
                        <div class="flex justify-between">
                            <span class="text-slate-400">Requires Large Stage</span>

                            @if($artist->requires_large_stage)
                                <span class="rounded-full bg-yellow-500/20 px-3 py-1 text-xs font-semibold text-yellow-400">
                                    Yes
                                </span>
                            @else
                                <span class="rounded-full bg-green-500/20 px-3 py-1 text-xs font-semibold text-green-400">
                                    No
                                </span>
                            @endif
                        </div>
                    </div>
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
                    {{-- Booking Cost --}}
                    <div class="flex justify-between">
                        <span class="text-slate-400">Booking Cost</span>
                        <span>${{ number_format($artist->booking_cost) }}</span>
                    </div>

                    {{-- Guarantee Fee --}}
                    <div class="flex justify-between">
                        <span class="text-slate-400">Guarantee Fee</span>
                        <span>${{ number_format($artist->guarantee_fee) }}</span>
                    </div>

                    {{-- Total Cost --}}
                    <div class="border-t border-slate-700 pt-4">
                        <div class="flex justify-between">
                            <span class="font-semibold">Total Cost to Book</span>
                            <span class="font-semibold">
                                ${{ number_format($total_cost) }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Performance Ratings --}}
            <div class="rounded-lg border border-slate-700 bg-slate-800">
                <div class="border-b border-slate-700 px-6 py-4">
                    <h2 class="font-semibold">Performance Ratings</h2>
                </div>

                <div class="space-y-4 p-6">
                    {{-- Popularity --}}
                    <div class="flex justify-between">
                        <span class="text-slate-400">Popularity</span>
                        <span>{{ $artist->popularity }}/100</span>
                    </div>

                    {{-- Draw Power --}}
                    <div class="flex justify-between">
                        <span class="text-slate-400">Draw Power</span>
                        <span>{{ $artist->draw_power }}/100</span>
                    </div>

                    {{-- Reliability --}}
                    <div class="flex justify-between">
                        <span class="text-slate-400">Reliability</span>
                        <span>{{ $artist->reliability }}/100</span>
                    </div>

                    {{-- Production Value --}}
                    <div class="flex justify-between">
                        <span class="text-slate-400">Production Value</span>
                        <span>{{ $artist->production_value }}/100</span>
                    </div>

                    {{-- Fan Loyalty --}}
                    <div class="flex justify-between">
                        <span class="text-slate-400">Fan Loyalty</span>
                        <span>{{ $artist->fan_loyalty }}/100</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
