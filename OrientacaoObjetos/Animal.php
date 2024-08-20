<?php

abstract class Animal{
    
    protected $nome;
    protected $raca;

    public function __construct($nome, $raca){
        $this->nome = $nome;
        $this->raca = $raca;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getRaca(){
        return $this->raca;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function setRaca($raca){
        $this->raca = $raca;
    }

    public abstract function emitirSom();
}

class Cachorro extends Animal{

    private $pelagem;
    
    public function __construct($nome, $raca, $pelagem){
        parent::__construct($nome, $raca);
        $this->pelagem = $pelagem;
    }

    public function getPelagem(){
        return $this->pelagem;
    }

    public function setPelagem($pelagem){
        $this->pelagem = $pelagem;
    }

    public function emitirSom(){
        echo "Au!";
    }

}