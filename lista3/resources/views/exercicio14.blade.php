@extends('layout')

@section('content')
<h2>Converter Quilômetros para Milhas</h2>
<form action="/exercicio14" method="POST">
    @csrf
    <div class="form-group mb-3">
        <label for="quilometros" class="form-label">Valor em Quilômetros:</label>
        <input type="number" class="form-control" name="quilometros" required placeholder="Digite o valor em quilômetros">
    </div>
    <button type="submit" class="btn btn-primary">Converter</button>
</form>

@if(isset($resultado))
<h3 class="mt-4">Resultado: {{ $resultado }} mi</h3>
@endif
@endsection