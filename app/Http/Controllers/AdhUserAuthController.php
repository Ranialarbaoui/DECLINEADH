<?php 

namespace App\Http\Controllers;

use App\Models\AdhUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdhUserAuthController extends Controller
{



    public function showLoginForm(){
        return view('auth.adh-login');
        }
    
    public function index(){
        $users = AdhUser::all();
        return view('adh_user_auth.index', compact('users'));
        }
    public function create(){
        return view('adh_user_auth.create');
        }
    
    public function store(Request $request){
        $request->validate([
            'id' => 'required|string|unique:adh_user_auths,id',
            'nom' => 'required|string',
            'email' => 'required|email|unique:adh_user_auths,email',
            'password' => 'required|string|min:6',
        ]);

        AdhUser::create([
            'id' => $request->id,
            'nom' => $request->nom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('adh-user-auth.index')->with('success', 'Utilisateur créé avec succès.');
        }
    public function show($id){
        $user = AdhUser::findOrFail($id);
        return view('adh_user_auth.show', compact('user'));
        }
    public function edit($id){
        $user = AdhUser::findOrFail($id);
        return view('adh_user_auth.edit', compact('user'));
        }
    public function showForm(){
         $user = Auth::user(); // ou AdhUser::find($id); selon la méthode d’authentification
         $beneficiaires = $user->beneficiaires;

        return view('dashboard', compact('beneficiaires'));
        }




    // Met à jour un utilisateur
    public function update(Request $request, $id){
        $user = AdhUser::findOrFail($id);
        $request->validate([
            'nom' => 'required|string',
            'email' => 'required|email|unique:adh_user_auths,email,' . $id . ',id',
        ]);

        $user->nom = $request->nom;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('adh-user-auth.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }
// Supprime un utilisateur
    public function destroy($id)
    {
        AdhUser::destroy($id);
        return redirect()->route('adh-user-auth.index')->with('success', 'Utilisateur supprimé avec succès.');
    }


public function choisirType(Request $request)
{
    // Sauvegarde du type choisi dans la session
    return redirect()->back()->with('type', $request->input('type'));
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
        // $user->save();

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
