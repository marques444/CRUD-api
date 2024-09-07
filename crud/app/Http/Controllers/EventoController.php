<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    // Listar todos os eventos
    public function index()
    {
        $eventos = Evento::all();
        return response()->json($eventos);
    }

    // Criar um novo evento
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'local' => 'required|string|max:255',
            'data' => 'required|date',
        ]);

        $evento = Evento::create($validatedData);

        return response()->json(['message' => 'Evento criado com sucesso!', 'evento' => $evento], 201);
    }

    // Mostrar um evento específico
    public function show($id)
    {
        $evento = Evento::find($id);

        if (!$evento) {
            return response()->json(['message' => 'Evento não encontrado.'], 404);
        }

        return response()->json($evento);
    }

    // Atualizar um evento específico
    public function update(Request $request, $id)
    {
        $evento = Evento::find($id);

        if (!$evento) {
            return response()->json(['message' => 'Evento não encontrado.'], 404);
        }

        $validatedData = $request->validate([
            'nome' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|max:255',
            'local' => 'sometimes|required|string|max:255',
            'data' => 'sometimes|required|date',
        ]);

        $evento->update($validatedData);

        return response()->json(['message' => 'Evento atualizado com sucesso!', 'evento' => $evento]);
    }

    // Deletar um evento específico
    public function destroy($id)
    {
        $evento = Evento::find($id);

        if (!$evento) {
            return response()->json(['message' => 'Evento não encontrado.'], 404);
        }

        $evento->delete();

        return response()->json(['message' => 'Evento deletado com sucesso!']);
    }
}
