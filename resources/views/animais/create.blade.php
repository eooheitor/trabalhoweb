<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Criar Animal
        </h2>
    </x-slot>

    <div class="max-w-5xl mx-auto mt-8 p-6 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <form method="POST" action="{{ route('animais.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-6">
                <label for="nome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nome</label>
                <input type="text" id="nome" name="nome" value="{{ old('nome') }}"
                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Nome do animal" />
                @error('nome')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="tipo"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tipo</label>
                <select name="tipo" id="tipo"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="" selected>Selecione</option>
                    <option value="C" {{ old('tipo') == 'C' ? 'selected' : '' }}>Cachorro</option>
                    <option value="G" {{ old('tipo') == 'G' ? 'selected' : '' }}>Gato</option>
                </select>
                @error('tipo')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="sexo"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sexo</label>
                <select name="sexo" id="sexo"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="" selected>Selecione</option>
                    <option value="M" {{ old('sexo') == 'M' ? 'selected' : '' }}>Macho</option>
                    <option value="F" {{ old('sexo') == 'F' ? 'selected' : '' }}>Fêmea</option>
                </select>
                @error('sexo')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="descricao"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Descrição</label>
                <textarea id="descricao" name="descricao" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Descreva o animal">{{ old('descricao') }}</textarea>
                @error('descricao')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="dataresgate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Data
                    Resgate</label>
                <input type="date" id="dataresgate" name="dataresgate" value="{{ old('dataresgate') }}"
                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                @error('dataresgate')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="castradp"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Castrado</label>
                <select name="castrado" id="castrado"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="" selected>Selecione</option>
                    <option value="0" {{ old('castrado') == '0' ? 'selected' : '' }}>Não</option>
                    <option value="1" {{ old('sexo') == '1' ? 'selected' : '' }}>Sim</option>
                </select>
                @error('castrado')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="foto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Foto do
                    Animal</label>
                <input type="file" id="foto" name="foto"
                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                @error('foto')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="text-white bg-black hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-black dark:hover:bg-gray-900 dark:focus:ring-blue-800">Cadastrar</button>
        </form>
    </div>
</x-app-layout>
