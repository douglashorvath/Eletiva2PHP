@extends('layout')

@section('content')
<h2>Divisão de dois números</h2>
<form action="/exercicio4" method="POST">
    @csrf
    <div class="mb-3">
        <label for="numero1" class="form-label">Número 1:</label>
        <input type="number" class="form-control" name="numero1" required placeholder="Digite o primeiro número">
    </div>
    <div class="mb-3">
        <label for="numero2" class="form-label">Número 2:</label>
        <input type="number" class="form-control" name="numero2" required placeholder="Digite o segundo número">
    </div>
    <button type="submit" class="btn btn-primary">Calcular</button>
</form>

@if(isset($resultado))
<h3 class="mt-4">Resultado: {{ $resultado }}</h3>
@endif
@endsection