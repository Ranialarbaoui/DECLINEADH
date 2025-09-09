
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Changer votre mot de passe</h2>
    </x-slot>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
         <!-- name -->
<div>
    <x-input-label for="name" :value="__('Nom')" />
    <x-text-input id="name" name="name" type="text" required autofocus autocomplete="name" />
    <x-input-error :messages="$errors->get('name')" class="mt-2" />
</div>
 <!-- email -->
  <div class="mt-4">
    <x-input-label for="email" :value="__('Email')" />
    <x-text-input id="email" name="email" type="email" required autocomplete="email" />
    <x-input-error :messages="$errors->get('email')" class="mt-2" />
</div>
<!-- password    -->
        <div>
            <x-input-label for="new_password" :value="'Nouveau mot de passe'" />
            <x-text-input id="new_password" name="new_password" type="password" required />
            <x-input-error :messages="$errors->get('new_password')" />
        </div>

        <div class="mt-4">
            <x-input-label for="new_password_confirmation" :value="'Confirmation du mot de passe'" />
            <x-text-input id="new_password_confirmation" name="new_password_confirmation" type="password" required />
        </div>

        <div class="mt-4">
            <x-primary-button>Valider</x-primary-button>
        </div>
    </form>
</x-app-layout>
