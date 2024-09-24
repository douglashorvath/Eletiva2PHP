@extends('layout')

@section('content')
<h2>Converter Dias para Horas, Minutos e Segundos</h2>
<form action="/exercicio19" method="POST">
    @csrf
    <div class="form-group mb-3">
        <label for="dias" class="form-label">Dias:</label>
        <input type="number" class="form-control" name="dias" required placeholder="Digite a quantidade de dias">
    </div>
    <button type="submit" class="btn btn-primary">Converter</button>
</form>

@if(isset($resultado))
<h3 class="mt-4">Resultado: {{ $resultado['horas'] }} horas, {{ $resultado['minutos'] }} minutos ou {{ $resultado['segundos'] }} segundos</h3>
@endif
@endsection