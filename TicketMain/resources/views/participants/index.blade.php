<x-app-layout>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Participantes</h2>

        @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
        @endif

        <a href="{{ route('participants.create') }}" class="btn btn-primary mb-3">Adicionar Novo Participante</a>

        @if ($participants->isEmpty())
        <div class="alert alert-info text-center">
            Nenhum participante cadastrado.
        </div>
        @else
        <table class="table table-hover table-striped align-middle text-center shadow-sm">
            <thead class="thead-dark">
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($participants as $participant)
                <tr>
                    <td>{{ $participant->name }}</td>
                    <td>{{ $participant->email }}</td>
                    <td>
                        <a href="{{ route('participants.edit', $participant->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('participants.destroy', $participant->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este participante?')">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</x-app-layout>