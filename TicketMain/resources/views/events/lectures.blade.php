<x-app-layout>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Palestras do Evento: {{ $event->name }}</h2>

        @if ($lectures->isEmpty())
        <div class="alert alert-info text-center">
            Nenhuma palestra cadastrada para este evento.
        </div>
        @else
        <table class="table table-hover table-striped align-middle text-center shadow-sm">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lectures as $lecture)
                <tr>
                    <td>{{ $lecture->title }}</td>
                    <td>{{ $lecture->description }}</td>
                    <td>
                        <a href="{{ route('lectures.show', $lecture->id) }}" class="btn btn-info btn-sm">Ver Detalhes</a>
                        <a href="{{ route('lectures.edit', $lecture->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('lectures.destroy', $lecture->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir esta palestra?')">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif

        <div class="text-center mt-4">
            <a href="{{ route('lectures.create', ['event_id' => $event->id]) }}" class="btn btn-primary">Adicionar Nova Palestra</a>
            <a href="{{ route('events.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</x-app-layout>