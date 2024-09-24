<?php
class Funcionario
{
    private $nome;
    private $codigo;
    private $salarioBase;

    public function __construct($codigo, $nome, $salarioBase)
    {
        $this->codigo = $codigo;
        $this->nome = $nome;
        $this->salarioBase = $salarioBase;
    }

    // Getters e Setters
    public function getNome()
    {
        return $this->nome;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function getSalarioBase()
    {
        return $this->salarioBase;
    }

    public function setSalarioBase($salarioBase)
    {
        $this->salarioBase = $salarioBase;
    }

    // Método para calcular o salário líquido
    public function getSalarioLiquido()
    {
        $inss = $this->salarioBase * 0.1;
        $ir = 0.0;

        if ($this->salarioBase > 2000) {
            $ir = ($this->salarioBase - 2000.0) * 0.12;
        }

        return $this->salarioBase - $inss - $ir;
    }

    // Método toString para exibir as informações
    public function __toString()
    {
        return get_class($this) . "\nCodigo: " . $this->getCodigo() .
            "\nNome: " . $this->getNome() .
            "\nSalario Base: " . $this->getSalarioBase() .
            "\nSalario Liquido: " . $this->getSalarioLiquido();
    }
}

class Servente extends Funcionario
{
    public function getSalarioLiquido()
    {
        $salarioComAdicional = $this->getSalarioBase() * 1.05; // 5% de insalubridade
        $inss = $salarioComAdicional * 0.1;
        $ir = 0.0;

        if ($salarioComAdicional > 2000) {
            $ir = ($salarioComAdicional - 2000.0) * 0.12;
        }

        return $salarioComAdicional - $inss - $ir;
    }
}

class Motorista extends Funcionario
{
    private $numeroCarteiraMotorista;

    public function __construct($codigo, $nome, $salarioBase, $numeroCarteiraMotorista)
    {
        parent::__construct($codigo, $nome, $salarioBase);
        $this->numeroCarteiraMotorista = $numeroCarteiraMotorista;
    }

    public function getNumeroCarteiraMotorista()
    {
        return $this->numeroCarteiraMotorista;
    }

    public function setNumeroCarteiraMotorista($numeroCarteiraMotorista)
    {
        $this->numeroCarteiraMotorista = $numeroCarteiraMotorista;
    }

    public function __toString()
    {
        return parent::__toString() . "\nNumero da Carteira de Motorista: " . $this->getNumeroCarteiraMotorista();
    }
}

class MestreDeObras extends Servente
{
    private $numeroFuncionariosSobComando;

    public function __construct($codigo, $nome, $salarioBase, $numeroFuncionariosSobComando)
    {
        parent::__construct($codigo, $nome, $salarioBase);
        $this->numeroFuncionariosSobComando = $numeroFuncionariosSobComando;
    }

    public function getNumeroFuncionariosSobComando()
    {
        return $this->numeroFuncionariosSobComando;
    }

    public function setNumeroFuncionariosSobComando($numeroFuncionariosSobComando)
    {
        $this->numeroFuncionariosSobComando = $numeroFuncionariosSobComando;
    }

    public function getSalarioLiquido()
    {
        $gruposDeDez = floor($this->numeroFuncionariosSobComando / 10);
        $salarioComAdicional = $this->getSalarioBase() * (1 + 0.05 + ($gruposDeDez * 0.10)); // Insalubridade + adicional por funcionários
        $inss = $salarioComAdicional * 0.1;
        $ir = 0.0;

        if ($salarioComAdicional > 2000) {
            $ir = ($salarioComAdicional - 2000.0) * 0.12;
        }

        return $salarioComAdicional - $inss - $ir;
    }

    public function __toString()
    {
        return parent::__toString() . "\nNumero de Funcionarios Sob Comando: " . $this->getNumeroFuncionariosSobComando();
    }
}

// Exemplo do uso das classes:

$servente = new Servente(101, "João", 1800);
echo $servente;

$motorista = new Motorista(102, "Pedro", 2200, "12345678");
echo $motorista;

$mestre = new MestreDeObras(103, "Carlos", 3000, 25);
echo $mestre;
