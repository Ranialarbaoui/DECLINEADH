<?php 

namespace App\Http\Controllers;

use App\Models\AdhUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdhUserAuthController extends Controller
{

//      public function __construct()
// {
//     $this->middleware('auth')->only(['show']);
// }

    public function showLoginForm()
    {
        return view('auth.adh-login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'id' => 'required|string',
            'password' => 'required|string',
        ]);
        
        $user = AdhUser::find($request->id);

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['id' => 'ID ou mot de passe incorrect.'])->withInput();
        } 
        
        Auth::login($user);

        // Si mot de passe par défaut, rediriger vers page changement
        if (Hash::check('caarama', $user->password)) {
            return redirect()->route('password.update.form')->with('message', 'Veuillez changer votre mot de passe par défaut.');
        }

        // Rediriger vers le tableau de bord après connexion réussie
        return redirect()->intended('/dashboard')->with('success', 'Connexion réussie!');
    }

    public function showPasswordForm()
    {
        return view('auth.password-update');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'new_password' => 'required|string|confirmed|min:6',
        ]);
        
        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect('/dashboard')->with('status', 'Mot de passe modifié avec succès.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
    
}
