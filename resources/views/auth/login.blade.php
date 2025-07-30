<x-guest-layout>
    <div class="w-full max-w-md">
        <!-- Logo/Brand Section -->
        <div class="text-center mb-8">
            <div class="mx-auto w-16 h-16 bg-white rounded-full flex items-center justify-center shadow-lg mb-4">
                <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
            <h2 class="text-3xl font-bold text-white mb-2">Connexion</h2>
            <p class="text-white/80 text-sm">Accédez à votre espace personnel</p>
        </div>

        <!-- Login Form -->
        <div class="glass-effect rounded-2xl p-8 shadow-xl">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            @if (session('message'))
                <div class="mb-4 p-4 bg-blue-100 border border-blue-400 text-blue-700 rounded-lg">
                    {{ session('message') }}
                </div>
            @endif

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- ID -->
                <div>
                    <x-input-label for="id" :value="__('NSS/(ID):')" class="text-gray-700 font-medium mb-2" />
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <x-text-input 
                            id="id" 
                            class="block mt-1 w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg bg-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150" 
                            type="text" 
                            name="id" 
                            :value="old('id')" 
                            required 
                            autofocus 
                            placeholder="Entrez votre identifiant"
                        />
                    </div>
                    <x-input-error :messages="$errors->get('id')" class="mt-2" />
                </div>

                <!-- Mot de passe -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Mot de passe')" class="text-gray-700 font-medium mb-2" />
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <x-text-input 
                            id="password" 
                            class="block mt-1 w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg bg-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150" 
                            type="password" 
                            name="password" 
                            required 
                            placeholder="Entrez votre mot de passe"
                        />
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Souviens-toi de moi -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 h-4 w-4" name="remember">
                        <span class="ms-2 text-sm text-gray-700">{{ __('Se souvenir de moi') }}</span>
                    </label>
                </div>

                <!-- Bouton de connexion -->
                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="w-full justify-center py-3 px-4 text-sm font-medium rounded-lg transition duration-150 ease-in-out transform hover:scale-105">
                        {{ __('Se connecter') }}
                    </x-primary-button>
                </div>
            </form>

            <!-- Help Text -->
            <div class="mt-6 text-center">
                <p class="text-xs text-gray-600">
                    Pour votre première connexion, utilisez le mot de passe par défaut: <span class="font-mono font-medium">caarama</span>
                </p>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center mt-8">
            <p class="text-white/60 text-xs">
                Système de gestion d'adhérents
            </p>
        </div>
    </div>
</x-guest-layout>
