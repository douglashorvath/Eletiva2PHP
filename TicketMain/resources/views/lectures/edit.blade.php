<x-app-layout>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Editar Palestra</h2>

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

        <form action="{{ route('lectures.update', $lecture->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Título</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $lecture->title }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrição</label>
                <textarea class="form-control" id="description" name="description" required>{{ $lecture->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="event_id" class="form-label">Evento</label>
                <select class="form-select" id="event_id" name="event_id" required>
                    @foreach ($events as $event)
                    <option value="{{ $event->id }}" {{ $lecture->event_id == $event->id ? 'selected' : '' }}>
                        {{ $event->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="{{ route('lectures.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</x-app-layout>