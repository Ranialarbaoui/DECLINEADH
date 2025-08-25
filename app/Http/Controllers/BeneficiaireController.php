<?php 

namespace App\Http\Controllers;

use App\Models\Adherent;
use App\Models\Beneficiaire;
// use Illuminate\Container\Attributes\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class BeneficiaireController extends Controller
{
    public function showForm()
    {  

      $beneficiaires = Beneficiaire::all(); //************************** parfait

// $beneficiaires = Beneficiaire::with('adherent_id','code_adh')->get();
// $codAdh = Auth::user()->code_adh;
// $codAdh = Auth::user()->cod_adh; // récupérer le cod_adh de l'adhérent connecté


// dd($codAdh, Beneficiaire::first());
// dd(Auth::user()->cod_adh);
// dd(Auth::user());
// $beneficiaires = DB::table('beneficiaires as b')
//     ->join('adherents as a', 'b.adherent_id', '=', 'a.code_adh')
//     ->where('a.code_adh', $codAdh)
//     ->get();
  return view('dashboard', compact('beneficiaires'));
   
    }
}




