@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-4xl space-y-6">

    {{-- Header --}}
    <div>
        <h1 class="text-3xl font-bold text-white">
            Edit Festival
        </h1>

        <p class="mt-1 text-sm text-slate-400">
            Update festival information.
        </p>
    </div>

    {{-- Form --}}
    <div class="rounded-lg border border-slate-700 bg-slate-800">
        <form action="{{ route('events.update', $event) }}"
              method="POST"
              class="space-y-6 p-6">

            @csrf
            @method('PUT')

            @include('events._form')

            {{-- Actions --}}
            <div class="flex justify-end gap-3 border-t border-slate-700 pt-6">

                <a href="{{ route('events.show', $event) }}"
                   class="rounded-lg border border-slate-600 px-4 py-2 text-sm text-slate-300 hover:bg-slate-700">
                    Cancel
                </a>

                <button
                    type="submit"
                    class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-500">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
