<x-app-layout>
    <div class="container">
        <h2>Criar Evento</h2>

        <form action="{{ route('events.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nome do Evento</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrição</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Data do Evento</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>

            <div class="mb-3">
                <label for="time" class="form-label">Hora do Evento</label>
                <input type="time" class="form-control" id="time" name="time" required>
            </div>

            <div class="mb-3">
                <label for="capacity" class="form-label">Capacidade</label>
                <input type="number" class="form-control" id="capacity" name="capacity" required>
            </div>

            <button type="submit" class="btn btn-primary">Criar Evento</button>
            <a href="{{ route('events.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</x-app-layout>