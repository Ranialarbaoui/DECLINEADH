<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\AdhUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Affiche le formulaire login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Traite la soumission du formulaire
    // public function login(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'id' => ['required', 'string'],
    //         'password' => ['required', 'string'],
    //     ]);

    //     if (Auth::attempt(['id' => $credentials['id'], 'password' => $credentials['password']], $request->filled('remember'))) {
    //         $request->session()->regenerate();
    //         return redirect()->intended('/dashboard'); // ou autre page
    //     }

    //     return back()->withErrors([
    //         'id' => 'Identifiant ou mot de passe invalide.',
    //     ]);
    // }

    public function login(Request $request)
{
    $request->validate([
        'id' => ['required', 'string'],
        'password' => ['required', 'string'],
    ]);

    // Récupérer l'utilisateur par son id (NSS)
    $user = \App\Models\AdhUser::where('id', $request->id)->first();

    if (!$user) {
        return back()->withErrors(['id' => 'Identifiant incorrect.']);
    }

    // Vérifier mot de passe
    // Cas 1 : mot de passe par défaut "caarama"
    // Cas 2 : mot de passe hashé dans la BD

    if (
        $request->password === 'caarama' ||
        Hash::check($request->password, $user->password)
    ) {
        Auth::login($user, $request->filled('remember'));
        return redirect()->intended('/dashboard');
    }

    return back()->withErrors(['password' => 'Mot de passe incorrect.']);
}





    public function register(Request $request)
{
    $validated = $request->validate([
        'id' => 'required|string|unique:adh_users,id',
        'password' => 'required|string|confirmed',
    ]);

    $user = new AdhUser();
    $user->id = $validated['id'];
    $user->password = Hash::make($validated['password']); // important !
    $user->save();

    return redirect()->route('login')->with('success', 'Utilisateur enregistré avec succès.');
}
}
