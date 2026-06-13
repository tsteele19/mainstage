@extends('layouts.app')

@section('content')
    @if(request('search'))
        <p class="mt-1 text-sm text-slate-400">
            {{ $venues->count() }} matching venues
        </p>
    @else
        <p class="mt-1 text-sm text-slate-400">
            {{ $venues->count() }} venues available
        </p>
    @endif

    {{-- Search --}}
    <form method="GET" class="mb-6 flex gap-2">
        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Search venues..."
            class="flex-1 rounded-lg border border-slate-700 bg-slate-800 px-4 py-2 text-white"
        >

        <button
            type="submit"
            class="rounded-lg bg-sky-600 px-4 py-2 text-white hover:bg-sky-500"
        >
            Search
        </button>

        {{--  Reset Button --}}
        @if(request('search'))
            <a
                href="{{ route('venues.index') }}"
                class="rounded-lg bg-slate-700 px-4 py-2 text-white hover:bg-slate-600"
            >
                Reset
            </a>
        @endif
    </form>

    {{--  If searching, update page... --}}
    @if(request('search'))
        <p class="mb-4 text-sm text-slate-400">
            Showing results for:
            <span class="font-semibold text-white">
                {{ request('search') }}
            </span>
        </p>
    @endif

    @if ($venues->isEmpty())
        <div class="rounded-lg border border-slate-700 bg-slate-800 p-6">
            <p class="text-slate-400">No venues found.</p>
        </div>
    @else
        <div class="overflow-hidden rounded-lg border border-slate-700 bg-slate-800">
            <table class="min-w-full divide-y divide-slate-700">
                <thead class="bg-slate-900">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-400">
                            Name
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-400">
                            City
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-400">
                            State
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-400">
                            Country
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-400">
                            Type
                        </th>
                        <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider text-slate-400">
                            Capacity
                        </th>
                        <th class="px-6 py-3 text-center text-xs font-semibold uppercase tracking-wider text-slate-400">
                            Active
                        </th>

                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-700">
                    @foreach ($venues as $venue)
                        <tr class="hover:bg-slate-700/50">
                            {{-- Venue Name --}}
                            <td class="px-6 py-4">
                                <a
                                    href="{{ route('venues.show', $venue) }}"
                                    class="font-medium text-sky-400 hover:text-sky-300 hover:underline"
                                >
                                    {{ $venue->name }}
                                </a>
                            </td>

                            {{-- City --}}
                            <td class="px-6 py-4 text-slate-300">
                                {{ $venue->city }}
                            </td>

                            {{-- State --}}
                            <td class="px-6 py-4 text-slate-300">
                                {{ $venue->state }}
                            </td>

                            {{-- Country --}}
                            <td class="px-6 py-4 text-slate-300">
                                {{ $venue->country }}
                            </td>

                            {{-- Type --}}
                            <td class="px-6 py-4 text-slate-300">
                                {{ Str::title($venue->type) }}
                            </td>

                            {{-- Capacity --}}
                            <td class="px-6 py-4 text-right text-slate-300">
                                {{ number_format($venue->capacity) }}
                            </td>

                            {{-- Active --}}
                            <td class="px-6 py-4 text-center">
                                @if($venue->is_active)
                                    <span class="rounded-full bg-green-500/20 px-3 py-1 text-xs font-semibold text-green-400">
                                        Active
                                    </span>
                                @else
                                    <span class="rounded-full bg-red-500/20 px-3 py-1 text-xs font-semibold text-red-400">
                                        Inactive
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
