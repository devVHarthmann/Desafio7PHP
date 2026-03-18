<?php 
class pedido{
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
    public function totalBruto(){
        return $this->quantidade * $this->preco;
    }
    public function calcDesconto(){
        if($this->typeC == "premium"){
            return 0.9;
        }
    }
    public function calcImposto(){
        $imposto = $this->totalBruto() * 0.08;
        return $imposto;
    }
    public function calcTotal(){
        
    }
}

?>