{{-- Festival Name --}}
<div>
    <label
        for="name"
        class="mb-2 block text-sm font-medium text-slate-300">
        Festival Name
    </label>

    <input
        type="text"
        id="name"
        name="name"
        value="{{ old('name', $event->name ?? '') }}"
        class="w-full rounded-lg border border-slate-600 bg-slate-900 px-4 py-2 text-white focus:border-indigo-500 focus:outline-none"
        required>

    @error('name')
        <p class="mt-2 text-sm text-red-400">
            {{ $message }}
        </p>
    @enderror
</div>

{{-- Description --}}
<div>
    <label
        for="bio"
        class="mb-2 block text-sm font-medium text-slate-300">
        Description
    </label>

    <textarea
        id="bio"
        name="bio"
        rows="5"
        class="w-full rounded-lg border border-slate-600 bg-slate-900 px-4 py-2 text-white focus:border-indigo-500 focus:outline-none">{{ old('bio', $event->bio ?? '') }}</textarea>

    @error('bio')
        <p class="mt-2 text-sm text-red-400">
            {{ $message }}
        </p>
    @enderror
</div>

<div class="grid gap-6 md:grid-cols-2">

    {{-- Start Date --}}
    <div>
        <label
            for="starts_at"
            class="mb-2 block text-sm font-medium text-slate-300">
            Start Date
        </label>

        <input
            type="date"
            id="starts_at"
            name="starts_at"
            value="{{ old('starts_at', isset($event) ? $event->starts_at?->format('Y-m-d') : '') }}"
            class="w-full rounded-lg border border-slate-600 bg-slate-900 px-4 py-2 text-white focus:border-indigo-500 focus:outline-none"
            required>

        @error('starts_at')
            <p class="mt-2 text-sm text-red-400">
                {{ $message }}
            </p>
        @enderror
    </div>

    {{-- Duration --}}
    <div>
        <label
            for="duration"
            class="mb-2 block text-sm font-medium text-slate-300">
            Duration (Days)
        </label>

        <input
            type="number"
            id="duration"
            name="duration"
            min="1"
            value="{{ old('duration', $event->duration ?? 1) }}"
            class="w-full rounded-lg border border-slate-600 bg-slate-900 px-4 py-2 text-white focus:border-indigo-500 focus:outline-none"
            required>

        @error('duration')
            <p class="mt-2 text-sm text-red-400">
                {{ $message }}
            </p>
        @enderror
    </div>
</div>
