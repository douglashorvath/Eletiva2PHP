@extends('layout')

@section('content')
<h2>Média de três notas</h2>
<form action="/exercicio5" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nota1" class="form-label">Nota 1:</label>
        <input type="number" class="form-control" name="nota1" required placeholder="Digite a primeira nota" step="0.01">
    </div>
    <div class="mb-3">
        <label for="nota2" class="form-label">Nota 2:</label>
        <input type="number" class="form-control" name="nota2" required placeholder="Digite a segunda nota" step="0.01">
    </div>
    <div class="mb-3">
        <label for="nota3" class="form-label">Nota 3:</label>
        <input type="number" class="form-control" name="nota3" required placeholder="Digite a terceira nota" step="0.01">
    </div>
    <button type="submit" class="btn btn-primary">Calcular</button>
</form>

@if(isset($resultado))
<h3 class="mt-4">Resultado: {{ $resultado }}</h3>
@endif
@endsection