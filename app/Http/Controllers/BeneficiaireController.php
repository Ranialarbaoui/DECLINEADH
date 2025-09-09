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
  
      // $beneficiaires = Beneficiaire::all();
  $numimma =(Auth::user()->id);
  $adherents = Adherent::where('numeimma', $numimma)->get();
  $codeAdh = $adherents->first()->code_adh ?? null;
 $beneficiaires = Beneficiaire::where('adherent_id',$codeAdh )->get();
//  dd($beneficiaires);
  return view('dashboard', compact('beneficiaires'));
   
    }
}




