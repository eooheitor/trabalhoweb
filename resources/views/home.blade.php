<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apad</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <!-- Navigation -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <img src="{{ asset('uploads/logo/logo.jpg') }}" alt="Logo" class="w-20 h-20 rounded-full object-cover">

            @if (Auth::check())
                <div class="mr-5">
                    <a href="{{ route('animais.index') }}"
                        class="text-gray-800 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400 text-lg font-medium">
                        Cadastrar
                    </a>
                </div>
            @else
                <div class="mr-5">
                    <a href="{{ route('login') }}"
                        class="text-gray-800 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400 text-lg font-medium">
                        Login
                    </a>
                </div>
            @endif
        </div>
    </nav>


    <!-- Content -->
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center mb-8">Nossos Animais</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($animais as $animal)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    @if ($animal->foto)
                        <img src="{{ asset('uploads/' . $animal->foto) }}" alt="{{ $animal->nome }}"
                            class="w-full h-48 object-cover">
                    @else
                        <img src="https://via.placeholder.com/150" alt="{{ $animal->nome }}"
                            class="w-full h-48 object-cover">
                    @endif
                    <div class="p-4">
                        <h2 class="text-xl font-bold">{{ $animal->nome }}</h2>
                        <p class="text-gray-700">
                            {{ $animal->tipo == 'C' ? 'Cachorro' : 'Gato' }}
                        </p>
                        <p class="text-gray-700">
                            {{ $animal->sexo == 'M' ? 'Macho' : 'Fêmea' }}
                        </p>
                        <p class="text-gray-700">
                            Castrado: {{ $animal->castrado == 0 ? 'Não' : 'Sim' }}
                        </p>
                        <p class="text-gray-700">
                            Descrição: {{ $animal->descricao }}
                        </p>
                        <p class="text-gray-700">
                            Data de Resgate: {{ \Carbon\Carbon::parse($animal->dataresgate)->format('d/m/Y') }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white shadow-md mt-8 py-4">
        <div class="container mx-auto text-center">
            &copy; 2024 Apad - Rio do sul
        </div>
    </footer>
</body>

</html>
