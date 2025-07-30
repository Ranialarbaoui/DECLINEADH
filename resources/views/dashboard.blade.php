<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard - {{ config('app.name', 'Laravel') }}</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen">
        <!-- Navigation -->
        <nav class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <h1 class="text-xl font-semibold text-gray-900">
                            Système de gestion d'adhérents
                        </h1>
                    </div>
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-700">Bonjour, {{ Auth::user()->nom }}</span>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md text-sm transition">
                                Déconnexion
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('status'))
                <div class="mb-4 bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded">
                    {{ session('status') }}
                </div>
            @endif

            <div class="px-4 py-6 sm:px-0">
                <div class="border-4 border-dashed border-gray-200 rounded-lg p-8">
                    <div class="text-center">
                        <div class="mx-auto w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Connexion réussie!</h2>
                        <p class="text-gray-600 mb-6">
                            Bienvenue dans le système de gestion d'adhérents. Vous êtes maintenant connecté avec l'ID: <span class="font-mono font-medium">{{ Auth::user()->id }}</span>
                        </p>
                        
                        <div class="bg-white rounded-lg shadow p-6 text-left max-w-md mx-auto">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Informations de votre compte:</h3>
                            <dl class="space-y-2">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">ID:</dt>
                                    <dd class="text-sm text-gray-900">{{ Auth::user()->id }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Nom:</dt>
                                    <dd class="text-sm text-gray-900">{{ Auth::user()->nom }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Email:</dt>
                                    <dd class="text-sm text-gray-900">{{ Auth::user()->email }}</dd>
                                </div>
                            </dl>
                        </div>

                        @if(\Illuminate\Support\Facades\Hash::check('caarama', Auth::user()->password))
                            <div class="mt-6 bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <h3 class="text-sm font-medium text-yellow-800">
                                            Mot de passe par défaut détecté
                                        </h3>
                                        <div class="mt-2 text-sm text-yellow-700">
                                            <p>Pour votre sécurité, nous recommandons de changer votre mot de passe par défaut.</p>
                                        </div>
                                        <div class="mt-4">
                                            <a href="{{ route('password.update.form') }}" class="bg-yellow-800 text-white px-3 py-2 rounded text-sm hover:bg-yellow-700 transition">
                                                Changer le mot de passe
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html> 