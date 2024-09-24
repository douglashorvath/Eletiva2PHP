<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Lista3Controller extends Controller
{
    //exibir o formulário do exercício 1
    public function exercicio1()
    {
        return view('exercicio1');
    }

    //somar dois números
    public function soma(Request $request)
    {
        $resultado = $request->input('numero1') + $request->input('numero2');
        return view('exercicio1', compact('resultado'));
    }

    //exibir o formulário do exercício 2
    public function exercicio2()
    {
        return view('exercicio2');
    }

    //subtrair dois números
    public function subtracao(Request $request)
    {
        $resultado = $request->input('numero1') - $request->input('numero2');
        return view('exercicio2', compact('resultado'));
    }

    //exibir o formulário do exercício 3
    public function exercicio3()
    {
        return view('exercicio3');
    }

    //multiplicar dois números
    public function multiplicacao(Request $request)
    {
        $resultado = $request->input('numero1') * $request->input('numero2');
        return view('exercicio3', compact('resultado'));
    }

    //exibir o formulário do exercício 4
    public function exercicio4()
    {
        return view('exercicio4');
    }

    //dividir dois números
    public function divisao(Request $request)
    {
        $numero1 = $request->input('numero1');
        $numero2 = $request->input('numero2');

        // Verificação de divisão por zero
        if ($numero2 == 0) {
            $resultado = 'Erro: Divisão por zero!';
        } else {
            $resultado = $numero1 / $numero2;
        }

        return view('exercicio4', compact('resultado'));
    }

    //exibir o formulário do exercício 5
    public function exercicio5()
    {
        return view('exercicio5');
    }

    //calcular a média de três notas
    public function media(Request $request)
    {
        $nota1 = $request->input('nota1');
        $nota2 = $request->input('nota2');
        $nota3 = $request->input('nota3');
        $resultado = ($nota1 + $nota2 + $nota3) / 3;

        return view('exercicio5', compact('resultado'));
    }

    //exibir o formulário do exercício 6
    public function exercicio6()
    {
        return view('exercicio6');
    }

    //conversão de Celsius para Fahrenheit
    public function converterCelsiusParaFahrenheit(Request $request)
    {
        $celsius = $request->input('celsius');
        $resultado = ($celsius * 9 / 5) + 32;
        return view('exercicio6', ['resultado' => $resultado]);
    }

    ///exibir o formulário do exercício 7
    public function exercicio7()
    {
        return view('exercicio7');
    }

    //conversão de Fahrenheit para Celsius
    public function converterFahrenheitParaCelsius(Request $request)
    {
        $fahrenheit = $request->input('fahrenheit');
        $resultado = ($fahrenheit - 32) * 5 / 9;
        return view('exercicio7', ['resultado' => $resultado]);
    }

    //exibir o formulário do exercício 8
    public function exercicio8()
    {
        return view('exercicio8');
    }

    //cálculo da área do retângulo
    public function calcularAreaRetangulo(Request $request)
    {
        $largura = $request->input('largura');
        $altura = $request->input('altura');
        $resultado = $largura * $altura;
        return view('exercicio8', ['resultado' => $resultado]);
    }

    //exibir o formulário do exercício 9
    public function exercicio9()
    {
        return view('exercicio9');
    }

    //cálculo da área do círculo
    public function calcularAreaCirculo(Request $request)
    {
        $raio = $request->input('raio');
        $resultado = pi() * pow($raio, 2);
        return view('exercicio9', ['resultado' => $resultado]);
    }

    //exibir o formulário do exercício 10
    public function exercicio10()
    {
        return view('exercicio10');
    }

    //cálculo do perímetro do retângulo
    public function calcularPerimetroRetangulo(Request $request)
    {
        $largura = $request->input('largura');
        $altura = $request->input('altura');
        $resultado = 2 * ($largura + $altura);
        return view('exercicio10', ['resultado' => $resultado]);
    }

    //exibir o formulário do exercício 11
    public function exercicio11()
    {
        return view('exercicio11');
    }

    //cálculo do perímetro do círculo
    public function calcularPerimetroCirculo(Request $request)
    {
        $raio = $request->input('raio');
        $resultado = 2 * pi() * $raio;
        return view('exercicio11', ['resultado' => $resultado]);
    }

    //exibir o formulário do exercício 12
    public function exercicio12()
    {
        return view('exercicio12');
    }

    //cálculo de potência
    public function calcularPotencia(Request $request)
    {
        $base = $request->input('base');
        $expoente = $request->input('expoente');
        $resultado = pow($base, $expoente);
        return view('exercicio12', ['resultado' => $resultado]);
    }

    //exibir o formulário do exercício 13
    public function exercicio13()
    {
        return view('exercicio13');
    }

    //conversão de metros para centímetros
    public function converterMetrosParaCentimetros(Request $request)
    {
        $metros = $request->input('metros');
        $resultado = $metros * 100;
        return view('exercicio13', ['resultado' => $resultado]);
    }

    //exibir o formulário do exercício 14
    public function exercicio14()
    {
        return view('exercicio14');
    }

    //conversão de quilômetros para milhas
    public function converterQuilometrosParaMilhas(Request $request)
    {
        $quilometros = $request->input('quilometros');
        $resultado = $quilometros * 0.621371;
        return view('exercicio14', ['resultado' => $resultado]);
    }

    //exibir o formulário do exercício 15
    public function exercicio15()
    {
        return view('exercicio15');
    }

    //cálculo do IMC
    public function calcularIMC(Request $request)
    {
        $peso = $request->input('peso');
        $altura = $request->input('altura');
        $resultado = $peso / pow($altura, 2);
        return view('exercicio15', ['resultado' => $resultado]);
    }

    //exibir o formulário do exercício 16
    public function exercicio16()
    {
        return view('exercicio16');
    }

    //cálculo do preço com desconto
    public function calcularPrecoComDesconto(Request $request)
    {
        $preco = $request->input('preco');
        $desconto = $request->input('desconto');
        $resultado = $preco - ($preco * ($desconto / 100));
        return view('exercicio16', ['resultado' => $resultado]);
    }

    //exibir o formulário do exercício 17
    public function exercicio17()
    {
        return view('exercicio17');
    }

    //cálculo de juros simples
    public function calcularJurosSimples(Request $request)
    {
        $capital = $request->input('capital');
        $taxa = $request->input('taxa');
        $periodo = $request->input('periodo');
        $resultado = $capital * ($taxa / 100) * $periodo;
        return view('exercicio17', ['resultado' => $resultado]);
    }

    //exibir o formulário do exercício 18
    public function exercicio18()
    {
        return view('exercicio18');
    }

    //cálculo do montante com juros compostos
    public function calcularMontanteComJurosCompostos(Request $request)
    {
        $capital = $request->input('capital');
        $taxa = $request->input('taxa');
        $periodo = $request->input('periodo');
        $resultado = $capital * pow((1 + $taxa / 100), $periodo);
        return view('exercicio18', ['resultado' => $resultado]);
    }

    //exibir o formulário do exercício 19
    public function exercicio19()
    {
        return view('exercicio19');
    }

    //conversão de dias para horas, minutos e segundos
    public function converterDias(Request $request)
    {
        $dias = $request->input('dias');
        $horas = $dias * 24;
        $minutos = $horas * 60;
        $segundos = $minutos * 60;

        return view('exercicio19', ['resultado' => [
            'horas' => $horas,
            'minutos' => $minutos,
            'segundos' => $segundos
        ]]);
    }


    //exibir o formulário do exercício 20
    public function exercicio20()
    {
        return view('exercicio20');
    }

    //cálculo da velocidade média
    public function calcularVelocidadeMedia(Request $request)
    {
        $distancia = $request->input('distancia');
        $tempo = $request->input('tempo');
        $resultado = $distancia / $tempo;
        return view('exercicio20', ['resultado' => $resultado]);
    }
}
