@extends('layout')

@section('content')
<h2>Cálculo da Área do Retângulo</h2>
<form action="/exercicio8" method="POST">
    @csrf
    <div class="form-group mb-3">
        <label for="largura" class="form-label">Largura:</label>
        <input type="number" class="form-control" name="largura" required placeholder="Digite a largura">
    </div>
    <div class="form-group mb-3">
        <label for="altura" class="form-label">Altura:</label>
        <input type="number" class="form-control" name="altura" required placeholder="Digite a altura">
    </div>
    <button type="submit" class="btn btn-primary">Calcular</button>
</form>

@if(isset($resultado))
<h3 class="mt-4">Resultado: {{ $resultado }} m²</h3>
@endif
@endsection