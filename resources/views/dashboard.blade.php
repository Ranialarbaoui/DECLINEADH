<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard - {{ config('app.name', 'Laravel') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex">

<aside class="w-64 bg-white shadow-lg fixed top-0 bottom-0 left-0 flex flex-col">

    <div class="p-6 border-b flex items-center justify-center">
        <img src="/logo.png" alt="Logo" class="h-12 w-auto">
    </div>

    <nav class="flex-1 p-6 space-y-4 overflow-y-auto">
        <a href="#" class="flex items-center px-4 py-2 rounded hover:bg-gray-200 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-700" fill="currentColor" viewBox="0 0 24 24">
                <path d="M19 3H5a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2V5a2 2 0 00-2-2zM5 19V5h14v14H5z"/>
                <path d="M7 7h10v2H7V7zm0 4h10v2H7v-2zm0 4h7v2H7v-2z"/>
            </svg>
            Déclaration
        </a>

        <a href="#" class="flex items-center px-4 py-2 rounded hover:bg-gray-200 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-700" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2a10 10 0 100 20 10 10 0 000-20zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
            </svg>
            Suivi de l'état
        </a>
        <hr>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="flex items-center w-full text-left px-4 py-2 rounded hover:bg-gray-200 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v1" />
                </svg>
                Déconnexion
            </button>
        </form>
    </nav>
</aside>



    <!-- Contenu principal -->
    <main class="flex-1 ml-64 pt-16 p-6">
        <!-- Navbar -->
        <nav class="bg-white shadow-md fixed top-0 left-64 right-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16 items-center">
                    <h1 class="text-xl font-semibold text-gray-900">Gestion D'adhérents</h1>
                    <div class="flex items-center space-x-4">
    <!-- Message Bonjour -->
    <span class="text-gray-700">Bonjour, {{ Auth::user()->nom }}</span>

    <a href="" class="bg-blue-600 hover:bg-blue-700 text-white rounded-full p-1.5 transition flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
        </svg>
    </a>

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

        <!-- Contenu principal -->
        <div class="mt-16">
            <h1 class="text-2xl font-bold mb-6">Déclaration Sinistre</h1>

            <!-- Formulaire Bénéficiaire -->
            <form id="mainForm" class="mb-4">
                @csrf
                <label for="beneficiaire" class="block font-medium mb-2">Bénéficiaire :</label>
                <select id="beneficiaire" name="beneficiaire" required class="border p-2 rounded w-full">
                    <option value="" disabled selected>-- Sélectionnez --</option>
                    @foreach($beneficiaires as $beneficiaire)
                        <option value="{{ $beneficiaire->code_benef }}">
                            {{ $beneficiaire->nom_memb }}
                        </option>
                    @endforeach
                </select>
            </form>

            <!-- Formulaire Date soin -->
            <form action="{{ route('sinistres.store') }}" method="POST" class="mb-6">
                @csrf
                <label for="dateSoin" class="block font-medium mb-2">Date de soin :</label>
                <input type="date" id="dateSoin" name="date_soin" required class="border p-2 rounded">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md ml-2">
                    Enregistrer
                </button>
            </form>

            <!-- Sélection actes médicaux -->
            <div class="bg-white p-6 rounded shadow">
                <h2 class="text-xl font-semibold mb-4">Sélection des actes médicaux</h2>

                <div class="mb-4">
                    <label class="block font-medium mb-2">Type de forfait :</label>
                    <button type="button" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded mr-2"
                        onclick="showForfait('fmed')">Forfait Médicale</button>
                    <button type="button" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded"
                        onclick="showForfait('forf')">Forfait</button>
                </div>

                <form action="#" method="POST">
                    @csrf
                    <div id="actes-container" class="space-y-4"></div>

                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded mt-4">
                        Valider
                    </button>
                </form>
            </div>
        </div>
    </main>

    <!-- JS Toggle des documents -->
    <script>
        function showForfait(type) {
            fetch(`/dashbord/actes/${type}`)
                .then(response => response.json())
                .then(data => {
                    let container = document.getElementById('actes-container');
                    container.innerHTML = "";

                    if (data.length === 0) {
                        container.innerHTML = "<p class='text-red-600'>Aucun acte trouvé pour ce type.</p>";
                        return;
                    }

                    data.forEach(acte => {
                        let bloc = `
                            <div class="border rounded shadow">
                                <button type="button" 
                                    class="w-full flex justify-between items-center px-4 py-3 bg-gray-100 hover:bg-gray-200 transition"
                                    onclick="toggleDocs('docs-${acte.codepres}')">
                                    <span class="font-semibold">${acte.libepres}</span>
                                    <span id="icon-docs-${acte.codepres}" class="transform transition-transform">▶</span>
                                </button>
                                <div id="docs-${acte.codepres}" class="hidden px-4 py-3 space-y-2">
                        `;

                        for (let i = 1; i <= acte.nbr_doc; i++) {
                            bloc += `
                                <div class="flex items-center">
                                    <input type="checkbox" name="documents[]" value="${acte.codepres}-${i}" id="doc${acte.codepres}_${i}" class="mr-2">
                                    <label for="doc${acte.codepres}_${i}">📄 Document ${i}</label>
                                </div>`;
                        }

                        bloc += `</div></div>`;
                        container.innerHTML += bloc;
                    });
                });
        }

        function toggleDocs(id) {
            let docs = document.getElementById(id);
            let icon = document.getElementById("icon-" + id);

            if (docs.classList.contains("hidden")) {
                docs.classList.remove("hidden");
                icon.classList.add("rotate-90");
            } else {
                docs.classList.add("hidden");
                icon.classList.remove("rotate-90");
            }
        }
    </script>
</body>
</html>
