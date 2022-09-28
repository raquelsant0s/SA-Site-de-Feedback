<?php

class Produto{
    
    private $id;
    private $nome;
    private $valor;
    private $marca;
    private $img;
    
    function getID() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getValor() {
        return $this->valor;
    }

    function getMarca() {
        return $this->marca;
    }

    function getImg() {
        return $this->img;
    }

    function setID($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function setMarca($marca) {
        $this->marca = $marca;
    }

    function setImg($img) {
        $this->img = $img;
    }
    
}

