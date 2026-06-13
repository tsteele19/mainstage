@extends('layouts.app')

@section('content')
    @if(request('search'))
        <p class="mt-1 text-sm text-slate-400">
            {{ $artists->count() }} matching artists
        </p>
    @else
        <p class="mt-1 text-sm text-slate-400">
            {{ $artists->count() }} artists available
        </p>
    @endif

    {{-- Search --}}
    <form method="GET" class="mb-6 flex gap-2">
        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Search artists..."
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
                href="{{ route('artists.index') }}"
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

    @if ($artists->isEmpty())
        <div class="rounded-lg border border-slate-700 bg-slate-800 p-6">
            <p class="text-slate-400">No artists found.</p>
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
                            Genre
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-400">
                            Popularity
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-400">
                            Based In
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-400">
                            Active
                        </th>

                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-700">
                    @foreach ($artists as $artist)
                        <tr class="hover:bg-slate-700/50">
                            {{-- Name --}}
                            <td class="px-6 py-4">
                                <a
                                    href="{{ route('artists.show', $artist) }}"
                                    class="font-medium text-sky-400 hover:text-sky-300 hover:underline"
                                >
                                    {{ $artist->name }}
                                </a>
                            </td>

                            {{-- Genre --}}
                            <td class="px-6 py-4 text-slate-300">
                                {{ $artist->genre }}
                            </td>

                            {{-- Popularity --}}
                            <td class="px-6 py-4 text-slate-300">
                                {{ $artist->popularity }}
                            </td>

                            {{-- Based In --}}
                            <td class="px-6 py-4 text-slate-300">
                                {{ $artist->based_in }}
                            </td>

                            {{-- Active --}}
                            <td class="px-6 py-4 text-center">
                                @if($artist->is_active)
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
