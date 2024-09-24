@extends('layout')

@section('content')
<h2>Montante com Juros Compostos</h2>
<form action="/exercicio18" method="POST">
    @csrf
    <div class="form-group mb-3">
        <label for="capital" class="form-label">Capital:</label>
        <input type="number" class="form-control" name="capital" required placeholder="Digite o capital">
    </div>
    <div class="form-group mb-3">
        <label for="taxa" class="form-label">Taxa de Juros (%):</label>
        <input type="number" step="0.01" class="form-control" name="taxa" required placeholder="Digite a taxa de juros">
    </div>
    <div class="form-group mb-3">
        <label for="periodo" class="form-label">Período (em anos):</label>
        <input type="number" class="form-control" name="periodo" required placeholder="Digite o período">
    </div>
    <button type="submit" class="btn btn-primary">Calcular</button>
</form>

@if(isset($resultado))
<h3 class="mt-4">Resultado: R$ {{ number_format($resultado, 2, ',', '.') }}</h3>
@endif
@endsection