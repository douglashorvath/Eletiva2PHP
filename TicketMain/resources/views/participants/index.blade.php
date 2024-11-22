<x-app-layout>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Participantes</h2>

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

        <a href="{{ route('participants.create') }}" class="btn btn-primary mb-3">Adicionar Novo Participante</a>

        @if ($participants->isEmpty())
        <div class="alert alert-info text-center">
            Nenhum participante cadastrado.
        </div>
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
                @foreach ($participants as $participant)
                <tr>
                    <td>{{ $participant->name }}</td>
                    <td>{{ $participant->email }}</td>
                    <td>
                        <a href="{{ route('participants.edit', $participant->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <button class="btn btn-danger btn-sm"
                            onclick="confirmDelete({{ $participant->id }})">Excluir</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>

    {{-- Script para confirmação de exclusão com SweetAlert2 --}}
    <script>
        function confirmDelete(participantId) {
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
                    form.action = `/participants/${participantId}`;
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