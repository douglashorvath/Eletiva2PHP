
<?php 
    class Livro{
    private $titulo;
    private $autor;
    private $ano;

    public function __construct($titulo, $autor, $ano){
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->setAno($ano);
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function getAutor(){
        return $this->autor;
    }

    public function getAno(){
        return $this->ano;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function setAutor($autor){
        $this->autor = $autor;
    }

    public function setAno($ano){
        if($ano < 1900)
            $ano = 1900;
        $this->ano = $ano;
        
    }

    
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
</head>
<body>
    <?php
    $obj = new Livro("O Livro","Ana",1850);
    var_dump($obj);
    ?>
</body>
</html>

