<?php


class Tarefa
{
    private $titulo;
    private $descricao;


    public function getTitulo()
    {
        return $this->titulo;
    }
    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }
}
