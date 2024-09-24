<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Lista3Controller;

Route::get('/', function () {
    return view('index');
});

// Rotas para os exercícios
Route::get('/exercicio1', function () {
    return view('exercicio1');
});
Route::post('/exercicio1', [Lista3Controller::class, 'soma']);

Route::get('/exercicio2', function () {
    return view('exercicio2');
});
Route::post('/exercicio2', [Lista3Controller::class, 'subtracao']);

Route::get('/exercicio3', function () {
    return view('exercicio3');
});
Route::post('/exercicio3', [Lista3Controller::class, 'multiplicacao']);

Route::get('/exercicio4', function () {
    return view('exercicio4');
});
Route::post('/exercicio4', [Lista3Controller::class, 'divisao']);

Route::get('/exercicio5', function () {
    return view('exercicio5');
});
Route::post('/exercicio5', [Lista3Controller::class, 'media']);

// Rotas para os exercícios 6 a 20
Route::get('/exercicio6', function () {
    return view('exercicio6');
});
Route::post('/exercicio6', [Lista3Controller::class, 'converterCelsiusParaFahrenheit']);

Route::get('/exercicio7', function () {
    return view('exercicio7');
});
Route::post('/exercicio7', [Lista3Controller::class, 'converterFahrenheitParaCelsius']);

Route::get('/exercicio8', function () {
    return view('exercicio8');
});
Route::post('/exercicio8', [Lista3Controller::class, 'calcularAreaRetangulo']);

Route::get('/exercicio9', function () {
    return view('exercicio9');
});
Route::post('/exercicio9', [Lista3Controller::class, 'calcularAreaCirculo']);

Route::get('/exercicio10', function () {
    return view('exercicio10');
});
Route::post('/exercicio10', [Lista3Controller::class, 'calcularPerimetroRetangulo']);

Route::get('/exercicio11', function () {
    return view('exercicio11');
});
Route::post('/exercicio11', [Lista3Controller::class, 'calcularPerimetroCirculo']);

Route::get('/exercicio12', function () {
    return view('exercicio12');
});
Route::post('/exercicio12', [Lista3Controller::class, 'calcularPotencia']);

Route::get('/exercicio13', function () {
    return view('exercicio13');
});
Route::post('/exercicio13', [Lista3Controller::class, 'converterMetrosParaCentimetros']);

Route::get('/exercicio14', function () {
    return view('exercicio14');
});
Route::post('/exercicio14', [Lista3Controller::class, 'converterQuilometrosParaMilhas']);

Route::get('/exercicio15', function () {
    return view('exercicio15');
});
Route::post('/exercicio15', [Lista3Controller::class, 'calcularIMC']);

Route::get('/exercicio16', function () {
    return view('exercicio16');
});
Route::post('/exercicio16', [Lista3Controller::class, 'calcularPrecoComDesconto']);

Route::get('/exercicio17', function () {
    return view('exercicio17');
});
Route::post('/exercicio17', [Lista3Controller::class, 'calcularJurosSimples']);

Route::get('/exercicio18', function () {
    return view('exercicio18');
});
Route::post('/exercicio18', [Lista3Controller::class, 'calcularMontanteComJurosCompostos']);

Route::get('/exercicio19', function () {
    return view('exercicio19');
});
Route::post('/exercicio19', [Lista3Controller::class, 'converterDias']);

Route::get('/exercicio20', function () {
    return view('exercicio20');
});
Route::post('/exercicio20', [Lista3Controller::class, 'calcularVelocidadeMedia']);
