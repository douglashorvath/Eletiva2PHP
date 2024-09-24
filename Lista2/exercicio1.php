<?php
class Ponto
{
    private $x;
    private $y;

    private static $contadorDePontos = 0;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
        self::$contadorDePontos++;
    }

    public function setX($x)
    {
        $this->x = $x;
    }

    public function getX()
    {
        return $this->x;
    }

    public function setY($y)
    {
        $this->y = $y;
    }

    public function getY()
    {
        return $this->y;
    }

    public function deslocar($dx, $dy)
    {
        $this->x += $dx;
        $this->y += $dy;
    }

    public function toString()
    {
        return "(" . $this->x . ", " . $this->y . ")";
    }

    public static function getContadorDePontos()
    {
        return self::$contadorDePontos;
    }

    public function distanciaPara(Ponto $outroPonto)
    {
        $deltaX = $outroPonto->getX() - $this->x;
        $deltaY = $outroPonto->getY() - $this->y;
        return sqrt(pow($deltaX, 2) + pow($deltaY, 2));
    }

    public function distanciaParaCoordenadas($x, $y)
    {
        $deltaX = $x - $this->x;
        $deltaY = $y - $this->y;
        return sqrt(pow($deltaX, 2) + pow($deltaY, 2));
    }

    public static function distanciaEntrePontos($x1, $y1, $x2, $y2)
    {
        $deltaX = $x2 - $x1;
        $deltaY = $y2 - $y1;
        return sqrt(pow($deltaX, 2) + pow($deltaY, 2));
    }
}

// Exemplo do uso da classe:
$p1 = new Ponto(3, 4);
$p2 = new Ponto(6, 8);

echo "Ponto 1: " . $p1->toString() . "\n";
echo "Ponto 2: " . $p2->toString() . "\n";

echo "Distância entre p1 e p2: " . $p1->distanciaPara($p2) . "\n";
echo "Distância de p1 para (10, 10): " . $p1->distanciaParaCoordenadas(10, 10) . "\n";
echo "Distância entre (1, 1) e (4, 5): " . Ponto::distanciaEntrePontos(1, 1, 4, 5) . "\n";

echo "Total de pontos criados: " . Ponto::getContadorDePontos() . "\n";
