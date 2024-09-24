@extends('layout')

@section('content')
<h2>Converter Celsius para Fahrenheit</h2>
<form action="/exercicio6" method="POST">
    @csrf
    <div class="form-group mb-3">
        <label for="celsius" class="form-label">Temperatura em Celsius:</label>
        <input type="number" class="form-control" name="celsius" required placeholder="Digite a temperatura em Celsius">
    </div>
    <button type="submit" class="btn btn-primary">Converter</button>
</form>

@if(isset($resultado))
<h3 class="mt-4">Resultado: {{ $resultado }} °F</h3>
@endif
@endsection