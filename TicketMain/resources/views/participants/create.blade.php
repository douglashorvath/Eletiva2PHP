<x-app-layout>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Adicionar Participante</h2>

        {{-- Mensagem de Sucesso --}}
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

        {{-- Validação de Erros --}}
        @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Erro!',
                text: 'Por favor, corrija os erros no formulário.',
            });
        </script>
        @endif

        <form action="{{ route('participants.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Adicionar</button>
            <a href="{{ route('participants.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</x-app-layout>