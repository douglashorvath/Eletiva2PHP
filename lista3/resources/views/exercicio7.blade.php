@extends('layout')

@section('content')
<h2>Converter Fahrenheit para Celsius</h2>
<form action="/exercicio7" method="POST">
    @csrf
    <div class="form-group mb-3">
        <label for="fahrenheit" class="form-label">Temperatura em Fahrenheit:</label>
        <input type="number" class="form-control" name="fahrenheit" required placeholder="Digite a temperatura em Fahrenheit">
    </div>
    <button type="submit" class="btn btn-primary">Converter</button>
</form>

@if(isset($resultado))
<h3 class="mt-4">Resultado: {{ $resultado }} °C</h3>
@endif
@endsection