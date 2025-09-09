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

{{-- 
           <form action="/ton-endpoint" method="POST">
                  @csrf
             <label for="beneficiaire">Bénéficiaire :</label>
              <select id="beneficiaire" name="beneficiaire" required>
                 <option value="" disabled selected>-- Sélectionnez --</option>
                  @foreach($beneficiaires as $beneficiaire)
                       <option value="{{ $beneficiaire->code_benef }}">
                                       {{ $beneficiaire->nom_memb }}
                       </option>
                   @endforeach
              </select> 
           </form>
          <br><br> 
                <form action="{{ route('adhuser.store') }}" method="POST">
                          @csrf
                      <label for="dateSoin">Date de soin :</label>
                      <input type="date" id="dateSoin" name="date_soin" required>
                      <button type="submit">Enregistrer</button>

                     <br><br>
 
         
                </fieldset>  --}}

v

 <h1>Déclaration Sinistre</h1>

    <!-- Formulaire principal -->
    <form id="mainForm">
        @csrf
        <div class="form-group">
             <label for="beneficiaire">Bénéficiaire :</label>
              <select id="beneficiaire" name="beneficiaire" required>
                 <option value="" disabled selected>-- Sélectionnez --</option>
                  @foreach($beneficiaires as $beneficiaire)
                       <option value="{{ $beneficiaire->code_benef }}">
                                       {{ $beneficiaire->nom_memb }}
                       </option>
                   @endforeach
              </select> 
        </div>
    </form>
             <form action="{{ route('sinistres.store') }}" method="POST">
                        @csrf
    <label for="dateSoin">Date de soin :</label>
    <input type="date" id="dateSoin" name="date_soin" required>
    <button type="submit">Enregistrer</button>
             </form>
                       <br><br>
        {{-- <div class="form-group">
            <label for="typeforfait ">Type de forfait :</label>
            <button type="button" onclick="showForfait('fmed')">Forfait Médicale</button>
            <button type="button" onclick="showForfait('forf')">Forfait </button>
        </div> --}}
        <div class="container">
    <h2 class="mb-4"> Sélection des actes médicaux</h2>

    <div class="form-group mb-3">
        <label for="typeforfait">Type de forfait :</label><br>
        <button type="button" class="btn btn-primary" onclick="showForfait('fmed')">Forfait Médicale</button>
        <button type="button" class="btn btn-secondary" onclick="showForfait('forf')">Forfait</button>
    </div>

    {{-- Zone où on injecte les résultats --}}
    <form action="#" method="POST">
        @csrf
        <div id="actes-container"></div>

        <button type="submit" class="btn btn-success mt-3">Valider</button>
    </form>
</div>

<script>
    function showForfait(type) {
        fetch(`/dashbord/actes/${type}`)
            .then(response => response.json())
            .then(data => {
                let container = document.getElementById('actes-container');
                container.innerHTML = "";

                if (data.length === 0) {
                    container.innerHTML = "<p class='text-danger'>Aucun acte trouvé pour ce type.</p>";
                    return;
                }

                data.forEach(acte => {
                    let bloc = `<div class="card mb-3">
                        <div class="card-header"><strong>${acte.libepres}</strong></div>
                        <div class="card-body">`;

                    for (let i = 1; i <= acte.nbr_doc; i++) {
                        bloc += `
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="documents[]" value="${acte.codepres}-${i}" id="doc${acte.codepres}_${i}">
                                <label class="form-check-label" for="doc${acte.codepres}_${i}">📄 Document ${i}</label>
                            </div>`;
                    }

                    bloc += `</div></div>`;
                    container.innerHTML += bloc;
                });
            });
    }
</script>
 </div>

       </main>
          </div>
</body>
</html> 