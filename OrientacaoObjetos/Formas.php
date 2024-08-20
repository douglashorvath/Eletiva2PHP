<?php

    interface Formas{

        public function area();

    }

    class Retangulo implements Formas{
        private $base;
        private $altura;

        public function area(){
            return $this->base * $this->altura;
        }
    }