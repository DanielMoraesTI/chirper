@props(['selected' => 'crono'])

<div data-avatar-picker>
    <div class="grid grid-cols-4 sm:grid-cols-7 gap-2">
        @foreach (\App\Models\User::AVATARS as $slug => $label)
            <label class="relative flex flex-col items-center gap-1 p-2 rounded-lg border border-base-300 cursor-pointer transition has-checked:border-primary has-checked:bg-primary/10"
                   data-avatar-slug="{{ $slug }}"
                   data-avatar-name="{{ $label }}"
                   data-avatar-bio="{{ \App\Models\User::AVATAR_BIOS[$slug] ?? '' }}"
                   data-avatar-img="{{ asset("images/chrono-trigger/avatars/{$slug}.png") }}">
                <input type="radio"
                       name="avatar"
                       value="{{ $slug }}"
                       class="sr-only peer"
                       {{ old('avatar', $selected) === $slug ? 'checked' : '' }}
                       required>
                <span class="absolute -top-2 -right-2 hidden peer-checked:flex items-center justify-center h-6 w-6 rounded-full bg-primary text-primary-content text-xs shadow">
                    ⚔️
                </span>
                <img src="{{ asset("images/chrono-trigger/avatars/{$slug}.png") }}"
                     alt="{{ $label }}"
                     class="h-12 w-auto object-contain">
                <span class="text-xs">{{ $label }}</span>
            </label>
        @endforeach
    </div>

    <p class="text-xs text-base-content/60 mt-2">
        
    </p>

    <dialog class="modal avatar-lore-modal">
        <div class="modal-box avatar-lore-box">
            <div class="avatar-lore-portrait">
                <img data-avatar-lore-img src="" alt="">
            </div>
            <h3 data-avatar-lore-name class="avatar-lore-name"></h3>
            <p data-avatar-lore-bio class="avatar-lore-bio"></p>
            <div class="modal-action">
                <button type="button" class="btn btn-ghost btn-sm" data-avatar-lore-cancel>
                    Voltar
                </button>
                <button type="button" class="btn btn-primary btn-sm" data-avatar-lore-confirm>
                    ⚔️ Escolher
                </button>
            </div>
        </div>
        <button type="button" class="modal-backdrop" data-avatar-lore-backdrop aria-label="Fechar">
            fechar
        </button>
    </dialog>
</div>
