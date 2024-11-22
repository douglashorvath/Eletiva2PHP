<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Lecture;
use App\Models\Participant;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StatsController extends Controller
{
    public function index()
    {
        // Configurar idioma para português no Carbon
        Carbon::setLocale('pt_BR');

        $totalEvents = Event::count();
        $totalLectures = Lecture::count();
        $totalParticipants = Participant::count();
        $totalRegistrations = DB::table('lecture_participant')->count();

        // Dados para o gráfico de eventos por mês
        $eventsPerMonth = Event::select(DB::raw('MONTH(date) as month, COUNT(*) as total'))
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month')
            ->toArray();

        // Convertendo números de mês para nomes usando Carbon
        $eventsPerMonthLabels = array_map(function ($month) {
            return Carbon::createFromFormat('m', $month)->translatedFormat('F'); // Nome do mês traduzido
        }, array_keys($eventsPerMonth));
        $eventsPerMonthData = array_values($eventsPerMonth);

        // Dados para o gráfico de palestras por evento
        $lecturesPerEvent = Lecture::with('event')
            ->select('event_id', DB::raw('COUNT(*) as total'))
            ->groupBy('event_id')
            ->get()
            ->mapWithKeys(function ($lecture) {
                return [$lecture->event->name => $lecture->total];
            })
            ->toArray();

        $lecturesPerEventLabels = array_keys($lecturesPerEvent);
        $lecturesPerEventData = array_values($lecturesPerEvent);

        return view('stats.index', compact(
            'totalEvents',
            'totalLectures',
            'totalParticipants',
            'totalRegistrations',
            'eventsPerMonthLabels',
            'eventsPerMonthData',
            'lecturesPerEventLabels',
            'lecturesPerEventData'
        ));
    }
}
