@extends('layout')

@section('content')
<h2>Cálculo do IMC</h2>
<form action="/exercicio15" method="POST">
    @csrf
    <div class="form-group mb-3">
        <label for="peso" class="form-label">Peso (kg):</label>
        <input type="number" class="form-control" name="peso" required placeholder="Digite seu peso">
    </div>
    <div class="form-group mb-3">
        <label for="altura" class="form-label">Altura (m):</label>
        <input type="number" step="0.01" class="form-control" name="altura" required placeholder="Digite sua altura">
    </div>
    <button type="submit" class="btn btn-primary">Calcular</button>
</form>

@if(isset($resultado))
<h3 class="mt-4">Resultado: {{ $resultado }}</h3>
@endif
@endsection