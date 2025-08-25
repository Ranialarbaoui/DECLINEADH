<?php

namespace App\Http\Controllers;

use App\Models\AdhUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordChangeController extends Controller
{
    public function edit()
    {
        return view('auth.password-change');
    }

   public function updatePassword(Request $request)
   {
      $user = AdhUser::find($request->id);

         if (!$user) {
           return back()->withErrors(['id' => 'Utilisateur non trouvé.']);
          }

    $user->password = Hash::make($request->password);
    $user->save();

    return back()->with('success', 'Mot de passe mis à jour avec succès.');
 }
}
