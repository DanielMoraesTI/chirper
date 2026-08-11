<x-layout>
    <x-slot:title>
        Cadastro
    </x-slot:title>

    <div class="hero hero-poster min-h-[calc(100vh-16rem)]">
        <div class="hero-content flex-row max-w-none w-full px-4">
            <div class="hero-poster-card-col">
                <div class="card w-full max-w-96 bg-base-100">
                    <div class="card-body register-card-body">
                        <h1 class="text-3xl font-bold text-center leading-tight mb-1">✦ Criar Conta ✦</h1>

                        <form method="POST" action="/register">
                            @csrf

                            <!-- Name -->
                            <label class="floating-label mb-1">
                                <input type="text"
                                       name="name"
                                       placeholder="João da Silva"
                                       value="{{ old('name') }}"
                                       class="input input-bordered @error('name') input-error @enderror"
                                       required
                                       autofocus>
                                <span>Nome</span>
                            </label>
                            @error('name')
                                <div class="label -mt-1 mb-1">
                                    <span class="label-text-alt text-error">{{ $message }}</span>
                                </div>
                            @enderror

                            <!-- Email -->
                            <label class="floating-label mb-1">
                                <input type="email"
                                       name="email"
                                       placeholder="email@exemplo.com"
                                       value="{{ old('email') }}"
                                       class="input input-bordered @error('email') input-error @enderror"
                                       required>
                                <span>E-mail</span>
                            </label>
                            @error('email')
                                <div class="label -mt-1 mb-1">
                                    <span class="label-text-alt text-error">{{ $message }}</span>
                                </div>
                            @enderror

                            <!-- Password -->
                            <label class="floating-label mb-1">
                                <input type="password"
                                       name="password"
                                       placeholder="••••••••"
                                       class="input input-bordered @error('password') input-error @enderror"
                                       required>
                                <span>Senha</span>
                            </label>
                            @error('password')
                                <div class="label -mt-1 mb-1">
                                    <span class="label-text-alt text-error">{{ $message }}</span>
                                </div>
                            @enderror

                            <!-- Avatar (personagem) -->
                            <div class="register-avatar-picker mb-2">
                                <span class="label-text block mb-1">Escolha seu personagem</span>
                                <x-avatar-picker />
                            </div>
                            @error('avatar')
                                <div class="label -mt-1 mb-1">
                                    <span class="label-text-alt text-error">{{ $message }}</span>
                                </div>
                            @enderror

                            <!-- Password Confirmation -->
                            <label class="floating-label mb-1">
                                <input type="password"
                                       name="password_confirmation"
                                       placeholder="••••••••"
                                       class="input input-bordered"
                                       required>
                                <span>Confirmar Senha</span>
                            </label>

                            <!-- Submit Button -->
                            <div class="form-control mt-2">
                                <button type="submit" class="btn btn-primary btn-sm w-full">
                                    ⚔️ Cadastrar
                                </button>
                            </div>
                        </form>

                        <div class="divider my-1">OU</div>
                        <p class="text-center text-sm">
                            Já tem uma conta?
                            <a href="/login" class="link link-primary">Entrar</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="hero-poster-image-col" aria-hidden="true"></div>
        </div>
    </div>
</x-layout>
