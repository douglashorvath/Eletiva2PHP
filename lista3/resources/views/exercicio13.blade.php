@extends('layout')

@section('content')
<h2>Converter Metros para Centímetros</h2>
<form action="/exercicio13" method="POST">
    @csrf
    <div class="form-group mb-3">
        <label for="metros" class="form-label">Valor em Metros:</label>
        <input type="number" class="form-control" name="metros" required placeholder="Digite o valor em metros">
    </div>
    <button type="submit" class="btn btn-primary">Converter</button>
</form>

@if(isset($resultado))
<h3 class="mt-4">Resultado: {{ $resultado }} cm</h3>
@endif
@endsection