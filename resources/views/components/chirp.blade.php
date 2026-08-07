@props(['chirp'])

<div class="card bg-base-100 shadow">
    <div class="card-body">
        <div class="flex space-x-3">
            @if ($chirp->user)
                <div class="chirp-avatar shrink-0">
                    <img src="{{ $chirp->user->avatarUrl() }}"
                        alt="Personagem de {{ $chirp->user->name }}: {{ \App\Models\User::AVATARS[$chirp->user->avatar] ?? 'Crono' }}"
                        class="h-14 w-auto object-contain" />
                </div>
            @else
                <div class="avatar placeholder">
                    <div class="size-10 rounded-full">
                        <img src="https://avatars.laravel.cloud/f61123d5-0b27-434c-a4ae-c653c7fc9ed6?vibe=stealth"
                            alt="Usuário Anônimo" class="rounded-full" />
                    </div>
                </div>
            @endif

            <div class="min-w-0 flex-1">
                <div class="flex justify-between w-full">
                    <div class="flex items-center gap-1">
                        <span class="text-sm font-semibold chirp-author">{{ $chirp->user ? $chirp->user->name : 'Anônimo' }}</span>
                        <span class="text-base-content/60">·</span>
                        <span class="text-sm text-base-content/60">{{ $chirp->created_at->diffForHumans() }}</span>
                        @if ($chirp->updated_at->gt($chirp->created_at->addSeconds(5)))
                            <span class="text-base-content/60">·</span>
                            <span class="text-sm text-base-content/60 italic">editado</span>
                        @endif
                    </div>

                    <!-- Replace the temporary @php block and $canEdit check with: -->
                    @can('update', $chirp)
                        <div class="flex gap-1">
                            <a href="/chirps/{{ $chirp->id }}/edit" class="btn btn-ghost btn-xs">
                                Editar
                            </a>
                            <form method="POST" action="/chirps/{{ $chirp->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Tem certeza que deseja excluir este pensamento?')"
                                    class="btn btn-ghost btn-xs text-error">
                                    Excluir
                                </button>
                            </form>
                        </div>
                    @endcan
                </div>
                <p class="mt-1">{{ $chirp->message }}</p>
            </div>
        </div>
    </div>
</div>