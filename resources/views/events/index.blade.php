@extends('layouts.app')

@section('content')
<div class="space-y-6">

    {{-- Page Header --}}
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-white">Events</h1>
            <p class="text-sm text-slate-400">
                Manage your festivals and live events.
            </p>
        </div>

        <a href="{{ route('events.create') }}"
           class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-500">
            Create Festival
        </a>
    </div>

    {{-- Search --}}
    <form method="GET" class="mb-6 flex gap-2">
        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Search festivals..."
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
                href="{{ route('events.index') }}"
                class="rounded-lg bg-slate-700 px-4 py-2 text-white hover:bg-slate-600"
            >
                Reset
            </a>
        @endif
    </form>

    {{-- Events Table --}}
    <div class="overflow-hidden rounded-lg border border-slate-700 bg-slate-800">
        <table class="min-w-full divide-y divide-slate-700">
            <thead class="bg-slate-900">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-400">
                        Name
                    </th>

                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-400">
                        Start Date
                    </th>

                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-400">
                        Duration
                    </th>

                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-400">
                        Status
                    </th>

                    <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider text-slate-400">
                        Actions
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-700">
                @forelse ($events as $event)
                    <tr class="hover:bg-slate-700/30">
                        {{-- Name --}}
                        <td class="px-6 py-4">
                            <a href="{{ route('events.show', $event) }}"
                               class="font-medium text-indigo-400 hover:text-indigo-300">
                                {{ $event->name }}
                            </a>
                        </td>

                        {{-- Start Date --}}
                        <td class="px-6 py-4 text-slate-300">
                            {{ $event->starts_at?->format('M j, Y') }}
                        </td>

                        {{-- Duration --}}
                        <td class="px-6 py-4 text-slate-300">
                            {{ $event->duration }} day{{ $event->duration != 1 ? 's' : '' }}
                        </td>

                        {{-- Status --}}
                        <td class="px-6 py-4">
                            <span class="rounded-full bg-blue-500/20 px-2 py-1 text-xs font-medium text-blue-400">
                                {{ ucfirst($event->status) }}
                            </span>
                        </td>

                        {{-- Actions --}}
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                {{-- Edit --}}
                                <a href="{{ route('events.edit', $event) }}"
                                   class="text-sm text-indigo-400 hover:text-indigo-300">
                                    Edit
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-slate-400">
                            No festivals have been created yet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
