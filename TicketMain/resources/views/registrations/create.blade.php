<x-app-layout>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Registrar Participante na Palestra: {{ $lecture->title }}</h2>

        {{-- Mensagem de Erro --}}
        @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Erro!',
                text: "{{ session('error') }}",
            });
        </script>
        @endif

        @if ($participants->isEmpty() || $participants->every(fn($p) => $lecture->participants->contains($p)))
        <div class="alert alert-info text-center">
            Não há participantes disponíveis para adicionar a esta palestra.
        </div>
        @else
        <form action="{{ route('registrations.store', $lecture->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="participant_id" class="form-label">Selecionar Participante</label>
                <select class="form-select" id="participant_id" name="participant_id" required>
                    @foreach ($participants as $participant)
                    @if (!$lecture->participants->contains($participant))
                    <option value="{{ $participant->id }}">{{ $participant->name }} ({{ $participant->email }})</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Registrar Participante</button>
            <a href="{{ route('lectures.show', $lecture->id) }}" class="btn btn-secondary">Cancelar</a>
        </form>
        @endif
    </div>
</x-app-layout>