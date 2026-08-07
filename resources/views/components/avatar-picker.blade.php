@props(['selected' => 'crono'])

<div class="grid grid-cols-4 sm:grid-cols-7 gap-2">
    @foreach (\App\Models\User::AVATARS as $slug => $label)
        <label class="flex flex-col items-center gap-1 p-2 rounded-lg border border-base-300 cursor-pointer transition has-checked:border-primary has-checked:bg-primary/10">
            <input type="radio"
                   name="avatar"
                   value="{{ $slug }}"
                   class="sr-only"
                   {{ old('avatar', $selected) === $slug ? 'checked' : '' }}
                   required>
            <img src="{{ asset("images/chrono-trigger/avatars/{$slug}.png") }}"
                 alt="{{ $label }}"
                 class="h-12 w-auto object-contain">
            <span class="text-xs">{{ $label }}</span>
        </label>
    @endforeach
</div>
