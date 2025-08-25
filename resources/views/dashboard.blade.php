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
                          Gestion D'adhérents
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

        {{-- Main Content  --}}
        <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">

         
        </main> 


           <form action="/ton-endpoint" method="POST">
                  @csrf
               <label for="beneficiaire">Bénéficiaire :</label>
                    <select id="beneficiaire" name="beneficiaire" required>
                       <option value="" disabled selected>-- Sélectionnez --</option>
                             @foreach($beneficiaires as $beneficiaire)
                                <option value="{{ $beneficiaire->id }}"> {{$beneficiaire->nom_memb }}</option>
                             @endforeach
            </select>

      <br><br> 
                 <label for="dateSoin">Date de soin :</label>
                    <input type="date" id="dateSoin" name="dateSoin" required>
                     <br><br>
 
         
                </fieldset> 

                <form action="{{ route('choisir.type') }}" method="POST">
                    @csrf
                        <button type="submit" name="type" value="FORF"
                      class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md text-sm transition">
                          FORF
                    </button>
                </form>

<!-- Formulaire avec bouton FORF -->
<form action="{{ route('choisir.type') }}" method="POST">
    @csrf
    <button type="submit" name="type" value="FORF"
        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm transition">
        FORF
    </button>
</form>

<!-- Si l’utilisateur a choisi FMED -->
@if(session('type') === 'FMED')
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>#</th>
                <th>Type d’acte FMED</th>
                <th>Sélection</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>CONSULTATION</td>
                <td><input type="radio" name="type_acte" value="CONSULTATION"></td>
            </tr>
            <tr>
                <td>2</td>
                <td>IMAGERIE / ANALYSES MÉDICALES</td>
                <td><input type="radio" name="type_acte" value="IMAGERIE / ANALYSES MÉDICALES"></td>
            </tr>
            <tr>
                <td>3</td>
                <td>ACTE DE SPÉCIALISTE</td>
                <td><input type="radio" name="type_acte" value="ACTE DE SPÉCIALISTE"></td>
            </tr>
            <!-- 👉 continue avec le reste de tes lignes -->
        </tbody>
    </table>
@endif
 </form>


{{-- <table border="1" cellpadding="8" cellspacing="0">
    <thead>
      <tr>
        <th>#</th>
        <th>Type d’acte FMED</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>CONSULTATION</td>
      </tr>
      <tr>
        <td>2</td>
        <td>IMAGERIE / ANALYSES MÉDICALES</td>
      </tr>
      <tr>
        <td>3</td>
        <td>ACTE DE SPÉCIALISTE</td>
      </tr>
      <tr>
        <td>4</td>
        <td>ACTE DE CHIRURGIE / MATERNITÉ</td>
      </tr>
      <tr>
        <td>5</td>
        <td>LUNETTERIE / RÉÉDUCATION / ACUPUNCTURE</td>
      </tr>
      <tr>
        <td>6</td>
        <td>DENTAIRE / ORTHOPHONIE</td>
      </tr>
      <tr>
        <td>7</td>
        <td>PHARMACIE AVEC CARTE CHIFA / PROTHÈSE DENTAIRE</td>
      </tr>
      <tr>
        <td>8</td>
        <td>PHARMACIE SANS CARTE CHIFA</td>
      </tr>
      <tr>
        <td>9</td>
        <td>ORTHODONTIE / CURE THERMALE / PROTHÈSE AUDITIVE</td>
      </tr>
      <tr>
        <td>10</td>
        <td>HOSPITALISATION MÉDICALE</td>
      </tr>
    </tbody>
  </table> --}}


  {{-- <table border="1" cellpadding="8" cellspacing="0">
  <thead>
    <tr>
      <th>Type d’acte FORF</th>
      <th>Sélection</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>	FORFAIT MATRIMONIAL</td>
      <td><input type="radio" name="type_acte" value="CONSULTATION"></td>
    </tr>
    <tr>
      <td>2</td>
      <td>FORFAIT SCOLAIRE</td>
      <td><input type="radio" name="type_acte" value="IMAGERIE / ANALYSES MÉDICALES"></td>
    </tr>
    <tr>
      <td>3</td>
      <td>FORFAIT PELERINAGE</td>
      <td><input type="radio" name="type_acte" value="ACTE DE SPÉCIALISTE"></td>
    </tr>
    <tr>
      <td>4</td>
      <td>FORFAIT FUNERAIRE</td>
      <td><input type="radio" name="type_acte" value="ACTE DE CHIRURGIE / MATERNITÉ"></td>
    </tr>
 
    <tr>
      <td>5</td>
      <td>FORFAIT MALADIE</td>
      <td><input type="radio" name="type_acte" value="DENTAIRE / ORTHOPHONIE"></td>
    </tr>
    <tr>
      <td>6</td>
      <td>FORFAIT DEPART A LA RETRAITE</td>
      <td><input type="radio" name="type_acte" value="PHARMACIE AVEC CARTE CHIFA / PROTHÈSE DENTAIRE"></td>
    </tr>

 
  </tbody>
</table>


  <table border="1" cellpadding="8" cellspacing="0">
  <thead>
    <tr>
      <th>Type d’acte FMED</th>
      <th>Sélection</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>CONSULTATION</td>
      <td><input type="radio" name="type_acte" value="CONSULTATION"></td>
    </tr>
    <tr>
      <td>2</td>
      <td>IMAGERIE / ANALYSES MÉDICALES</td>
      <td><input type="radio" name="type_acte" value="IMAGERIE / ANALYSES MÉDICALES"></td>
    </tr>
    <tr>
      <td>3</td>
      <td>ACTE DE SPÉCIALISTE</td>
      <td><input type="radio" name="type_acte" value="ACTE DE SPÉCIALISTE"></td>
    </tr>
    <tr>
      <td>4</td>
      <td>ACTE DE CHIRURGIE / MATERNITÉ</td>
      <td><input type="radio" name="type_acte" value="ACTE DE CHIRURGIE / MATERNITÉ"></td>
    </tr>
    <tr>
      <td>5</td>
      <td>LUNETTERIE / RÉÉDUCATION / ACUPUNCTURE</td>
      <td><input type="radio" name="type_acte" value="LUNETTERIE / RÉÉDUCATION / ACUPUNCTURE"></td>
    </tr>
    <tr>
      <td>6</td>
      <td>DENTAIRE / ORTHOPHONIE</td>
      <td><input type="radio" name="type_acte" value="DENTAIRE / ORTHOPHONIE"></td>
    </tr>
    <tr>
      <td>7</td>
      <td>PHARMACIE AVEC CARTE CHIFA / PROTHÈSE DENTAIRE</td>
      <td><input type="radio" name="type_acte" value="PHARMACIE AVEC CARTE CHIFA / PROTHÈSE DENTAIRE"></td>
    </tr>
    <tr>
      <td>8</td>
      <td>PHARMACIE SANS CARTE CHIFA</td>
      <td><input type="radio" name="type_acte" value="PHARMACIE SANS CARTE CHIFA"></td>
    </tr>
    <tr>
      <td>9</td>
      <td>ORTHODONTIE / CURE THERMALE / PROTHÈSE AUDITIVE</td>
      <td><input type="radio" name="type_acte" value="ORTHODONTIE / CURE THERMALE / PROTHÈSE AUDITIVE"></td>
    </tr>
    <tr>
      <td>10</td>
      <td>HOSPITALISATION MÉDICALE</td>
      <td><input type="radio" name="type_acte" value="HOSPITALISATION MÉDICALE"></td>
    </tr>
  </tbody>
</table --}}
 </div>

       </main>
          </div>
</body>
</html> 