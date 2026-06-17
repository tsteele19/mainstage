@extends('layouts.app')

@section('content')
<div class="space-y-6">

    {{-- Header --}}
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-white">
                Select Venue
            </h1>

            <p class="mt-1 text-sm text-slate-400">
                Choose a venue for <span class="font-medium text-white">{{ $event->name }}</span>.
            </p>
        </div>

        <a href="{{ route('events.show', $event) }}"
           class="rounded-lg border border-slate-600 px-4 py-2 text-sm text-slate-300 hover:bg-slate-700">
            Back to Festival
        </a>
    </div>

    {{-- Search --}}
    <div class="rounded-lg border border-slate-700 bg-slate-800 p-4">
        <form method="GET">
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search venues..."
                class="w-full rounded-lg border border-slate-600 bg-slate-900 px-4 py-2 text-white placeholder-slate-400 focus:border-indigo-500 focus:outline-none"
            >
        </form>
    </div>

    {{-- Venue Table --}}
    <div class="overflow-hidden rounded-lg border border-slate-700 bg-slate-800">
        <table class="min-w-full divide-y divide-slate-700">
            <thead class="bg-slate-900">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-400">
                        Name
                    </th>

                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-400">
                        Location
                    </th>

                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-400">
                        Type
                    </th>

                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-400">
                        Capacity
                    </th>

                    <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider text-slate-400">
                        Action
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-700">
                @forelse ($venues as $venue)
                    <tr class="hover:bg-slate-700/30">
                        {{-- Venue Name --}}
                        <td class="px-6 py-4 text-white">
                            {{ $venue->name }}
                        </td>

                        {{-- Venue Location --}}
                        <td class="px-6 py-4 text-slate-300">
                            {{ $venue->city }},
                            {{ $venue->state }}
                        </td>

                        {{-- Venue Type --}}
                        <td class="px-6 py-4 text-slate-300">
                            {{ Str::title($venue->type) }}
                        </td>

                        {{-- Venue Capacity --}}
                        <td class="px-6 py-4 text-slate-300">
                            {{ number_format($venue->capacity) }}
                        </td>

                        <td class="px-6 py-4 text-right">
                            <form
                                action="{{ route('events.venues.assign', [$event, $venue]) }}"
                                method="POST"
                                class="inline">

                                @csrf
                                @method('PUT')

                                <button
                                    type="submit"
                                    class="rounded-lg bg-indigo-600 px-3 py-2 text-sm font-medium text-white hover:bg-indigo-500">
                                    Select
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-slate-400">
                            No venues found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
