<?php

class Aluno
{
    private $nome;
    private $disciplina;
    private $n1;
    private $n2;
    private $n3;

    public function __construct($nome, $disciplina, $n1, $n2, $n3)
    {
        $this->nome = $nome;
        $this->disciplina = $disciplina;
        $this->n1 = $n1;
        $this->n2 = $n2;
        $this->n3 = $n3;
    }
    public function calcularMedia($n1, $n2, $n3)
    {
        $media = ($n1 + $n2 + $n3) / 3;
        if($media > 6){
            return "<h1>Aprovado</h1>";
        } else if($media > 4){
            return "<h1>Recuperação</h1>";
        } else{
            return "<h1>Reprovado</h1>";
        }
    }
}
