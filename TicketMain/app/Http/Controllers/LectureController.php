<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use App\Models\Event;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    public function index()
    {
        $lectures = Lecture::with('event')->get(); // Obtém palestras com os eventos relacionados
        return view('lectures.index', compact('lectures'));
    }

    public function create(Request $request)
    {
        $events = Event::all(); // Obter todos os eventos
        $selectedEventId = $request->get('event_id'); // Capturar o ID do evento da URL
        return view('lectures.create', compact('events', 'selectedEventId'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'event_id' => 'required|exists:events,id',
        ]);

        Lecture::create($request->all());

        return redirect()->route('lectures.index')->with('success', 'Palestra criada com sucesso!');
    }

    public function edit($id)
    {
        $lecture = Lecture::findOrFail($id);
        $events = Event::all();
        return view('lectures.edit', compact('lecture', 'events'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'event_id' => 'required|exists:events,id',
        ]);

        $lecture = Lecture::findOrFail($id);
        $lecture->update($request->all());

        return redirect()->route('lectures.index')->with('success', 'Palestra atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $lecture = Lecture::findOrFail($id);
        $lecture->delete();

        return redirect()->route('lectures.index')->with('success', 'Palestra excluída com sucesso!');
    }

    public function show($id)
    {
        $lecture = Lecture::with('participants')->findOrFail($id);
        return view('lectures.show', compact('lecture'));
    }
}
