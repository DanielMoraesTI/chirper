<x-layout>
    <x-slot:title>
        Meu Perfil
    </x-slot:title>

    <div class="hero hero-poster min-h-[calc(100vh-16rem)]">
        <div class="hero-content flex-row max-w-none w-full px-4">
            <div class="hero-poster-card-col">
                <div class="card w-full max-w-96 bg-base-100">
                    <div class="card-body">
                        <h1 class="text-3xl font-bold text-center mb-2">✦ Meu Perfil ✦</h1>
                        <p class="text-center text-sm text-base-content/60 mb-6">{{ $user->name }}</p>

                        <form method="POST" action="{{ route('profile.avatar.update') }}">
                            @csrf
                            @method('PUT')

                            <!-- Avatar (personagem) -->
                            <div class="mb-2">
                                <span class="label-text block mb-2">Escolha seu personagem</span>
                                <x-avatar-picker :selected="$user->avatar" />
                            </div>
                            @error('avatar')
                                <div class="label -mt-2 mb-2">
                                    <span class="label-text-alt text-error">{{ $message }}</span>
                                </div>
                            @enderror

                            <!-- Submit Button -->
                            <div class="form-control mt-8">
                                <button type="submit" class="btn btn-primary btn-sm w-full">
                                    ⚔️ Salvar Personagem
                                </button>
                            </div>
                        </form>

                        <div class="divider">OU</div>
                        <p class="text-center text-sm">
                            <a href="/" class="link link-primary">Voltar para os pensamentos</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="hero-poster-image-col" aria-hidden="true"></div>
        </div>
    </div>
</x-layout>
