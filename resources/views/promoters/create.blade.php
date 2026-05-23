@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold mb-6">Create Your Promoter</h1>

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
                required
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
                required
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
@endsection
