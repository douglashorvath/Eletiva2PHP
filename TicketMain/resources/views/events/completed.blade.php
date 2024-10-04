<x-app-layout>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Eventos Concluídos</h2>

        @if ($events->isEmpty())
        <div class="alert-info text-center" role="alert">
            Não há eventos concluídos.
        </div>
        @else
        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle text-center shadow-sm">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Data</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Capacidade</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                    <tr>
                        <td class="fw-bold">{{ $event->name }}</td>
                        <td>{{ $event->description }}</td>
                        <td>{{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($event->time)->format('H:i') }}</td>
                        <td>{{ $event->capacity }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</x-app-layout>