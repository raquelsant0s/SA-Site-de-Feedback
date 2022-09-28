<?php

class Avaliacao{
    
    private $id_cliente;
    private $id_produto;
    private $estrela;
    private $descricao;
    

    function getIDC() {
        return $this->id_cliente;
    }

    function getIDP() {
        return $this->id_produto;
    }

    function getEstrela() {
        return $this->estrela;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function setIDC($id_cliente) {
        $this->id_cliente = $id_cliente;
    }

    function setIDP($id_produto) {
        $this->id_produto = $id_produto;
    }

    function setEstrela($estrela) {
        $this->estrela = $estrela;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
    
}

