@extends('layout')

@section('content')
<h2>Cálculo de Preço com Desconto</h2>
<form action="/exercicio16" method="POST">
    @csrf
    <div class="form-group mb-3">
        <label for="preco" class="form-label">Preço:</label>
        <input type="number" class="form-control" name="preco" required placeholder="Digite o preço original">
    </div>
    <div class="form-group mb-3">
        <label for="desconto" class="form-label">Percentual de Desconto (%):</label>
        <input type="number" class="form-control" name="desconto" required placeholder="Digite o percentual de desconto">
    </div>
    <button type="submit" class="btn btn-primary">Calcular</button>
</form>

@if(isset($resultado))
<h3 class="mt-4">Preço com Desconto: {{ $resultado }}</h3>
@endif
@endsection