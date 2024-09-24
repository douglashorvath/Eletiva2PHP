<?php
abstract class Telefone
{
    protected $ddd;
    protected $numero;

    public function __construct($ddd, $numero)
    {
        $this->ddd = $ddd;
        $this->numero = $numero;
    }

    abstract public function calculaCusto($tempo);

    public function __toString()
    {
        return "DDD: {$this->ddd}, Número: {$this->numero}";
    }
}

class Fixo extends Telefone
{
    private $custoPorMinuto;

    public function __construct($ddd, $numero, $custoPorMinuto)
    {
        parent::__construct($ddd, $numero);
        $this->custoPorMinuto = $custoPorMinuto;
    }

    public function calculaCusto($tempo)
    {
        return $tempo * $this->custoPorMinuto;
    }

    public function __toString()
    {
        return parent::__toString() . ", Custo por Minuto: {$this->custoPorMinuto}";
    }
}

abstract class Celular extends Telefone
{
    protected $custoMinutoBase;
    protected $operadora;

    public function __construct($ddd, $numero, $custoMinutoBase, $operadora)
    {
        parent::__construct($ddd, $numero);
        $this->custoMinutoBase = $custoMinutoBase;
        $this->operadora = $operadora;
    }

    public function __toString()
    {
        return parent::__toString() . ", Custo por Minuto Base: {$this->custoMinutoBase}, Operadora: {$this->operadora}";
    }
}

class PrePago extends Celular
{
    public function __construct($ddd, $numero, $custoMinutoBase, $operadora)
    {
        parent::__construct($ddd, $numero, $custoMinutoBase, $operadora);
    }

    public function calculaCusto($tempo)
    {
        $custoComAumento = $this->custoMinutoBase * 1.40;
        return $tempo * $custoComAumento;
    }
}

class PosPago extends Celular
{
    public function __construct($ddd, $numero, $custoMinutoBase, $operadora)
    {
        parent::__construct($ddd, $numero, $custoMinutoBase, $operadora);
    }

    public function calculaCusto($tempo)
    {
        $custoComDesconto = $this->custoMinutoBase * 0.90;
        return $tempo * $custoComDesconto;
    }
}

// Exemplo do uso das classes:

$telefoneFixo = new Fixo(11, "1234-5678", 0.10);
echo $telefoneFixo . "\n";
echo "Custo da ligação (5 min): " . $telefoneFixo->calculaCusto(5) . "\n";

$celularPrePago = new PrePago(11, "9876-5432", 0.20, "Operadora A");
echo $celularPrePago . "\n";
echo "Custo da ligação (5 min): " . $celularPrePago->calculaCusto(5) . "\n";

$celularPosPago = new PosPago(11, "4567-8901", 0.25, "Operadora B");
echo $celularPosPago . "\n";
echo "Custo da ligação (5 min): " . $celularPosPago->calculaCusto(5) . "\n";
