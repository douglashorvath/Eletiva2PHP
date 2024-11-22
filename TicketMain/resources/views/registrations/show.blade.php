<x-app-layout>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Detalhes da Palestra: {{ $lecture->title }}</h2>

        <h5>Participantes Registrados</h5>
        @if ($lecture->participants->isEmpty())
        <p>Nenhum participante registrado nesta palestra.</p>
        @else
        <table class="table table-hover table-striped align-middle text-center shadow-sm">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lecture->participants as $participant)
                <tr>
                    <td>{{ $participant->name }}</td>
                    <td>{{ $participant->email }}</td>
                    <td>
                        <form action="{{ route('registrations.destroy', [$lecture->id, $participant->id]) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja remover este participante?')">Remover</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif

        <a href="{{ route('registrations.create', $lecture->id) }}" class="btn btn-primary mt-3">Registrar Novo Participante</a>
    </div>
</x-app-layout>