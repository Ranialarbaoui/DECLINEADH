<x-guest-layout>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-input-label for="id" :value="'ID'" />
            <x-text-input id="id" name="id" type="text" required autofocus />
            <x-input-error :messages="$errors->get('id')" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="'Mot de passe'" />
            <x-text-input id="password" name="password" type="password" required />
            <x-input-error :messages="$errors->get('password')" />
        </div>

        <div class="mt-4">
            <x-primary-button>Connexion</x-primary-button>
        </div>
    </form>
</x-guest-layout>
