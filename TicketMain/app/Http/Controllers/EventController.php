<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all(); // Obter todos os eventos
        return view('events.index', compact('events')); // Retornar a view com os eventos
    }

    public function create()
    {
        return view('events.create'); // Retornar a view para criar um novo evento
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'capacity' => 'required|integer|min:1',
        ]);

        Event::create($request->all()); // Criar um novo evento
        return redirect()->route('events.index')->with('success', 'Evento criado com sucesso!');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        // Validação dos dados
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'capacity' => 'required|integer|min:1',
        ]);

        // Localiza o evento pelo ID
        $event = Event::findOrFail($id);

        // Converte a data e hora para um objeto Carbon
        $event->date = \Carbon\Carbon::createFromFormat('Y-m-d H:i', $request->date . ' ' . $request->time);

        // Atualiza os atributos do evento
        $event->name = $request->name;
        $event->description = $request->description;
        $event->capacity = $request->capacity;

        // Salva o evento
        dd($event);
        $event->save();

        return redirect()->route('events.index')->with('success', 'Evento atualizado com sucesso!');
    }


    public function destroy(Event $event)
    {
        $event->delete(); // Excluir o evento
        return redirect()->route('events.index')->with('success', 'Evento excluído com sucesso!');
    }

    public function upcoming()
    {
        // Filtra eventos com data nos próximos 30 dias
        $events = Event::where('date', '>=', now())
            ->where('date', '<=', now()->addDays(30))
            ->get();

        return view('events.upcoming', compact('events'));
    }
    public function completed()
    {
        // Filtra eventos que a data já passou
        $events = Event::where('date', '<', now())->get();

        return view('events.completed', compact('events'));
    }

    public function show($id)
    {
        // se não acrescentar isso tava dando problema =)
        $event = Event::findOrFail($id); // Encontra o evento ou lança uma exceção se não for encontrado
        return view('events.show', compact('event')); // Retorna a view 'show' com os dados do evento
    }
}
