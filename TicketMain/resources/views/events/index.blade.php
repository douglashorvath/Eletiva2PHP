<x-app-layout>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Eventos</h2>

        @if(session('success'))
        <div class="alert-info text-center" role="alert">
            {{ session('success') }}
        </div>
        @endif

        @if ($events->isEmpty())
        <div class="alert-info text-center">
            Não há eventos cadastrados.
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
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                    <tr>
                        <td class="fw-bold">{{ $event->name }}</td>
                        <td>{{ $event->description }}</td>
                        <td>{{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}</td> <!-- Formatar data -->
                        <td>{{ \Carbon\Carbon::parse($event->time)->format('H:i') }}</td> <!-- Formatar hora -->
                        <td>{{ $event->capacity }}</td>
                        <td>
                            <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning">Editar</a>
                            <button class="btn btn-danger btn-sm" onclick="confirmDelete('{{ $event->id }}')">Excluir</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif

        <div class="text-center mt-4">
            <a href="{{ route('events.create') }}" class="btn btn-primary">Criar Novo Evento</a>
        </div>
    </div>

    <script>
        function confirmDelete(eventId) {
            Swal.fire({
                title: 'Tem certeza que deseja excluir este evento?',
                text: "Essa ação não pode ser desfeita!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sim, excluir!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + eventId).submit();
                }
            });
        }
    </script>

    @foreach ($events as $event)
    <form id="delete-form-{{ $event->id }}" action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:none;">
        @csrf
        @method('DELETE')
    </form>
    @endforeach
</x-app-layout>