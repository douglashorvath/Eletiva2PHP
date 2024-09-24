@extends('layout')

@section('content')
<h2>Cálculo de Potência</h2>
<form action="/exercicio12" method="POST">
    @csrf
    <div class="form-group mb-3">
        <label for="base" class="form-label">Base:</label>
        <input type="number" class="form-control" name="base" required placeholder="Digite a base">
    </div>
    <div class="form-group mb-3">
        <label for="expoente" class="form-label">Expoente:</label>
        <input type="number" class="form-control" name="expoente" required placeholder="Digite o expoente">
    </div>
    <button type="submit" class="btn btn-primary">Calcular</button>
</form>

@if(isset($resultado))
<h3 class="mt-4">Resultado: {{ $resultado }}</h3>
@endif
@endsection