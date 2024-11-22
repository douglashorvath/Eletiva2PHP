<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use App\Models\Participant;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function create($lectureId)
    {
        $lecture = Lecture::with('participants')->findOrFail($lectureId);
        $participants = Participant::all();

        return view('registrations.create', compact('lecture', 'participants'));
    }


    public function store(Request $request, $lectureId)
    {
        $lecture = Lecture::findOrFail($lectureId);

        $request->validate([
            'participant_id' => 'required|exists:participants,id',
        ]);

        // Verifica se o participante já está registrado
        if ($lecture->participants()->where('participant_id', $request->participant_id)->exists()) {
            return redirect()->route('registrations.create', $lectureId)
                ->with('error', 'Participante já registrado nesta palestra.');
        }

        $lecture->participants()->attach($request->participant_id);

        return redirect()->route('lectures.show', $lectureId)->with('success', 'Participante registrado com sucesso!');
    }


    public function destroy($lectureId, $participantId)
    {
        $lecture = Lecture::findOrFail($lectureId);

        $lecture->participants()->detach($participantId);

        return redirect()->route('lectures.index')->with('success', 'Inscrição removida com sucesso!');
    }
}
