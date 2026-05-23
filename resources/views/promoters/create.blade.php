@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold mb-6">Promoter Setup</h1>

    {{-- Existing Promoters --}}
    @if ($promoters->count())
        <div class="mb-10">
            <h2 class="text-xl font-bold mb-4">Select Existing Promoter</h2>

            <form method="POST" action="{{ route('promoters.select') }}">
                @csrf

                {{-- Existing Promoter Dropdown --}}
                <div class="mb-4">
                    <label for="promoter_id" class="block font-medium mb-2">
                        Existing Promoters
                    </label>

                    <select
                        name="promoter_id"
                        id="promoter_id"
                        class="w-full border rounded px-3 py-2"
                        required
                    >
                        <option value="">Select a promoter...</option>

                        @foreach ($promoters as $promoter)
                            <option
                                value="{{ $promoter->id }}"
                                {{ old('promoter_id') == $promoter->id ? 'selected' : '' }}
                            >
                                {{ $promoter->name }} - ${{ number_format($promoter->current_cash, 2) }} (starting cash)
                            </option>
                        @endforeach
                    </select>

                    @error('promoter_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Selected Promoter Preview --}}
                @php
                    $selected_promoter = $promoters->firstWhere('id', old('promoter_id'));
                @endphp

                @if ($selected_promoter)
                    <div class="mb-6 rounded border border-slate-700 bg-slate-800 p-4">
                        <h3 class="text-lg font-semibold">
                            {{ $selected_promoter->name }}
                        </h3>

                        @if ($selected_promoter->bio)
                            <p class="mt-2 text-sm text-slate-300">
                                {{ $selected_promoter->bio }}
                            </p>
                        @endif

                        <p class="mt-3 text-sm text-slate-400">
                            Current Cash:
                            ${{ number_format($selected_promoter->current_cash, 2) }}
                        </p>
                    </div>
                @endif

                <button
                    type="submit"
                    class="rounded bg-blue-600 px-4 py-2 text-white"
                >
                    Select Promoter
                </button>
            </form>
        </div>
    @endif

    <div class="border-t border-slate-700 pt-8">
        <h2 class="text-xl font-bold mb-6">Or Create Your Own Promoter</h2>

        <form method="POST" action="{{ route('promoters.store') }}">
            @csrf

            {{-- Name --}}
            <div class="mb-4">
                <label for="name" class="block font-medium mb-2">
                    Promoter Name
                </label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name') }}"
                    class="w-full border rounded px-3 py-2"
                >
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Bio --}}
            <div class="mb-6">
                <label for="bio" class="block font-medium mb-2">
                    Bio (Optional)
                </label>
                <textarea
                    name="bio"
                    id="bio"
                    rows="4"
                    class="w-full border rounded px-3 py-2"
                >{{ old('bio') }}</textarea>
                @error('bio')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Mode --}}
            <div class="mb-6">
                <label for="mode" class="block font-medium mb-2">
                    Mode
                </label>
                <select
                    name="mode"
                    id="mode"
                    class="w-full border rounded px-3 py-2"
                >
                    <option value="easy" {{ old('mode') === 'easy' ? 'selected' : '' }}>
                        Easy - Most starting cash ($25M), highest starting reputation and experience levels
                    </option>

                    <option value="normal" {{ old('mode', 'normal') === 'normal' ? 'selected' : '' }}>
                        Normal - Normal starting cash ($5M), average starting reputation and experience levels
                    </option>

                    <option value="hard" {{ old('mode') === 'hard' ? 'selected' : '' }}>
                        Hard - Less starting cash ($750K), little below average starting reputation and experience levels
                    </option>

                    <option value="very_hard" {{ old('mode') === 'very_hard' ? 'selected' : '' }}>
                        Very Hard - Least starting cash ($100K), least starting reputation and experience levels
                    </option>
                </select>

                @error('mode')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                Create Promoter
            </button>
        </form>
    </div>
</div>
@endsection
