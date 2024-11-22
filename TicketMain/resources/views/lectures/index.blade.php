<x-app-layout>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Palestras</h2>

        {{-- Mensagens de Sucesso --}}
        @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sucesso!',
                text: "{{ session('success') }}",
                timer: 3000,
                showConfirmButton: false
            });
        </script>
        @endif

        <a href="{{ route('lectures.create') }}" class="btn btn-primary mb-3">Adicionar Nova Palestra</a>

        @if ($lectures->isEmpty())
        <div class="alert alert-info text-center">
            Nenhuma palestra cadastrada.
        </div>
        @else
        <table class="table table-hover table-striped align-middle text-center shadow-sm">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Evento</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lectures as $lecture)
                <tr>
                    <td>{{ $lecture->title }}</td>
                    <td>{{ $lecture->event->name }}</td>
                    <td>
                        <a href="{{ route('lectures.show', $lecture->id) }}" class="btn btn-info btn-sm">Ver Participantes</a>
                        <a href="{{ route('registrations.create', $lecture->id) }}" class="btn btn-success btn-sm">Registrar Inscrições</a>
                        <a href="{{ route('lectures.edit', $lecture->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <button class="btn btn-danger btn-sm" onclick="confirmDelete({{ $lecture->id }})">Excluir</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>

    {{-- Script para confirmar exclusão com SweetAlert2 --}}
    <script>
        function confirmDelete(lectureId) {
            Swal.fire({
                title: 'Tem certeza?',
                text: "Você não poderá desfazer esta ação!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sim, excluir!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Cria um formulário e faz o submit
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = `/lectures/${lectureId}`;
                    form.innerHTML = `
                        @csrf
                        @method('DELETE')
                    `;
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        }
    </script>
</x-app-layout>