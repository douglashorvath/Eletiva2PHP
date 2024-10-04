<x-app-layout>
    <div class="container mt-5">
        <h2>{{ $event->name }}</h2>
        <p>{{ $event->description }}</p>
        <p><strong>Data:</strong> {{ $event->date->format('d/m/Y') }}</p>
        <p><strong>Hora:</strong> {{ $event->start_time }}</p>
        <p><strong>Capacidade:</strong> {{ $event->capacity }}</p>
    </div>
</x-app-layout>