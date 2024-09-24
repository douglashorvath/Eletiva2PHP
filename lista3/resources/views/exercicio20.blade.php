@extends('layout')

@section('content')
<h2>Calcular Velocidade Média</h2>
<form action="/exercicio20" method="POST">
    @csrf
    <div class="form-group mb-3">
        <label for="distancia" class="form-label">Distância (km):</label>
        <input type="number" class="form-control" name="distancia" required placeholder="Digite a distância percorrida">
    </div>
    <div class="form-group mb-3">
        <label for="tempo" class="form-label">Tempo (horas):</label>
        <input type="number" step="0.01" class="form-control" name="tempo" required placeholder="Digite o tempo em horas">
    </div>
    <button type="submit" class="btn btn-primary">Calcular</button>
</form>

@if(isset($resultado))
<h3 class="mt-4">Resultado: {{ number_format($resultado, 2) }} km/h</h3>
@endif
@endsection