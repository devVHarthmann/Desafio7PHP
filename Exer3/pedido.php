<?php
class pedido
{
    private $nome;
    private $quantidade;
    private $preco;
    private $typeC;


    public function __construct($nome, $quantidade, $preco, $typeC)
    {
        $this->nome = $nome;
        $this->quantidade = $quantidade;
        $this->preco = $preco;
        $this->typeC = $typeC;
    }
    public function totalBruto()
    {
        return $this->quantidade * $this->preco;
    }
    public function calcDesconto()
    {
        if ($this->typeC == "premium") {
            return 0.1 * $this->totalBruto();
        }
    }
    public function calcImposto()
    {
        $imposto = $this->totalBruto() * 0.08;
        return $imposto;
    }
    public function calcTotal()
    {
        return $this->totalBruto() + $this->calcImposto() - $this->calcDesconto();
    }
    public function exibir()
    {
        echo "Total bruto: R$" . number_format($this->totalBruto(), 2, ",", ".") . "<br>";
        echo "Desconto: R$" . number_format($this->calcDesconto(), 2, ",", ".") . "<br>";
        echo "Imposto: R$" . number_format($this->calcImposto(), 2, ",", ".") . "<br>";
        echo "TOTAL: R$" . number_format($this->calcTotal(), 2, ",", ".") . "<br>";
    }
}
