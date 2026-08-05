@props(['chirp'])

<div class="card bg-base-100 shadow">
    <div class="card-body">
        <div class="flex space-x-3 items-start">
            @if($chirp->user)
                <div class="avatar shrink-0">
                    <div class="w-10 h-10 rounded-full overflow-hidden">
                        <img src="https://avatars.laravel.cloud/{{ urlencode($chirp->user->email) }}"
                             alt="{{ $chirp->user->name }}'s avatar"
                             class="w-full h-full object-cover" />
                    </div>
                </div>
            @else
                <div class="avatar placeholder shrink-0">
                    <div class="w-10 h-10 rounded-full bg-neutral text-neutral-content flex items-center justify-center">
                        <span>A</span>
                    </div>
                </div>
            @endif

            <div class="min-w-0 flex-1">
                <div class="flex items-center gap-1">
                    <span class="text-sm font-semibold">{{ $chirp->user ? $chirp->user->name : 'Anonymous' }}</span>
                    <span class="text-base-content/60">·</span>
                    <span class="text-sm text-base-content/60">{{ $chirp->created_at->diffForHumans() }}</span>
                </div>

                <p class="mt-1 wrap-break-word">
                    {{ $chirp->message }}
                </p>
            </div>
        </div>
    </div>
</div>