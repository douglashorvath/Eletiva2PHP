@extends('layout')

@section('content')
<h2>Cálculo da Área do Círculo</h2>
<form action="/exercicio9" method="POST">
    @csrf
    <div class="form-group mb-3">
        <label for="raio" class="form-label">Raio:</label>
        <input type="number" class="form-control" name="raio" required placeholder="Digite o raio">
    </div>
    <button type="submit" class="btn btn-primary">Calcular</button>
</form>

@if(isset($resultado))
<h3 class="mt-4">Resultado: {{ $resultado }} m²</h3>
@endif
@endsection