<x-app-layout>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Adicionar Palestra</h2>

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

        {{-- Mensagem de Erros --}}
        @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Erro!',
                html: `
                    <ul style="text-align: left;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                `,
            });
        </script>
        @endif

        <form action="{{ route('lectures.store') }}" method="POST">
            @csrf

            {{-- Campo Título --}}
            <div class="mb-3">
                <label for="title" class="form-label">Título</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
            </div>

            {{-- Campo Descrição --}}
            <div class="mb-3">
                <label for="description" class="form-label">Descrição</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
            </div>

            {{-- Campo Evento --}}
            <div class="mb-3">
                <label for="event_id" class="form-label">Evento</label>
                <select class="form-select" id="event_id" name="event_id" required>
                    @foreach ($events as $event)
                    <option value="{{ $event->id }}"
                        {{ (isset($selectedEventId) && $selectedEventId == $event->id) ? 'selected' : '' }}>
                        {{ $event->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            {{-- Botões --}}
            <button type="submit" class="btn btn-primary">Adicionar</button>
            <a href="{{ route('lectures.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    {{-- Inclusão do SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</x-app-layout>