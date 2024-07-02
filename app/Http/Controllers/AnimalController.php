<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AnimalController extends Controller
{
    public function index()
    {
        $animais = Animal::orderBy('id', 'desc')->get();
        return view('animais.index', ['animais' => $animais]);
    }

    public function home()
    {
        $animais = Animal::orderBy('id', 'desc')->get();
        return view('home', ['animais' => $animais]);
    }

    public function create()
    {
        return view('animais.create', ['animal' => new Animal]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'nome' => 'required|string|max:255',
                'tipo' => 'required|string|max:255',
                'sexo' => 'required|string|max:255',
                'descricao' => 'required|string',
                'dataresgate' => 'required|date',
                'castrado' => 'required|string',
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'nome.required' => 'O nome é obrigatório.',
                'nome.string' => 'O nome deve ser um texto.',
                'nome.max' => 'O nome não pode ter mais que 255 caracteres.',
                'tipo.required' => 'O tipo é obrigatório.',
                'tipo.string' => 'O tipo deve ser um texto.',
                'tipo.max' => 'O tipo não pode ter mais que 255 caracteres.',
                'sexo.required' => 'O sexo é obrigatório.',
                'sexo.string' => 'O sexo deve ser um texto.',
                'sexo.max' => 'O sexo não pode ter mais que 255 caracteres.',
                'descricao.required' => 'A descrição é obrigatória.',
                'descricao.string' => 'A descrição deve ser um texto.',
                'dataresgate.required' => 'A data de resgate é obrigatória.',
                'dataresgate.date' => 'A data de resgate deve ser uma data válida.',
                'castrado.required' => 'O animal é castrado?',
                'foto.required' => 'A foto é obrigatória.',
            ]
        );

        $animal = new Animal;
        $animal->nome = $request->input('nome');
        $animal->tipo = $request->input('tipo');
        $animal->sexo = $request->input('sexo');
        $animal->castrado = $request->input('castrado');
        $animal->descricao = $request->input('descricao');
        $animal->dataresgate = $request->input('dataresgate');

        if ($request->hasFile('foto')) {
            $fileName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('uploads'), $fileName);
            $animal->foto = $fileName;
        }

        $animal->save();

        return redirect()->route('animais.index')->with('success', 'Animal criado com sucesso.');
    }

    public function edit($id)
    {
        $animal = Animal::findOrFail($id);
        return view('animais.edit', compact('animal'));
    }

    public function update(Request $request, $id)
    {
        $animal = Animal::findOrFail($id);

        $request->validate([
            'nome' => 'required|string|max:255',
            'tipo' => 'required|string|in:C,G',
            'sexo' => 'required|string|in:M,F',
            'castrado' => 'required|boolean',
            'descricao' => 'nullable|string',
            'dataresgate' => 'nullable|date',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $animal->nome = $request->input('nome');
        $animal->tipo = $request->input('tipo');
        $animal->sexo = $request->input('sexo');
        $animal->castrado = $request->input('castrado');
        $animal->descricao = $request->input('descricao');
        $animal->dataresgate = $request->input('dataresgate');

        if ($request->hasFile('foto')) {
            if ($animal->foto && file_exists(public_path('uploads/' . $animal->foto))) {
                unlink(public_path('uploads/' . $animal->foto));
            }
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);

            $animal->foto = $filename;
        }

        $animal->save();

        return redirect()->route('animais.index')->with('success', 'Animal atualizado com sucesso.');
    }


    public function destroy($id)
    {
        Animal::findOrFail($id)->delete();
        return redirect('/animais')->with('msg', 'Animal excluído');
    }
}
