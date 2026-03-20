<?php
class Produto
{
    private string $nome;
    private int $quantidade;
    private float $valorUnitario;

    public function __construct(string $nome, int $quantidade, float $valorUnitario)
    {
        $this->nome = $nome;
        $this->quantidade = $quantidade;
        $this->valorUnitario = $valorUnitario;
    }

    public function entradaEstoque(int $qtd): void
    {
        $this->quantidade += $qtd;
    }

    public function saidaEstoque(int $qtd): void
    {
        if ($this->quantidade >= $qtd) {
            $this->quantidade -= $qtd;
        } else {
            // Maybe throw exception or handle error
            echo "Quantidade insuficiente em estoque.<br>";
        }
    }

    public function consultarValorTotal(): float
    {
        return $this->quantidade * $this->valorUnitario;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getQuantidade(): int
    {
        return $this->quantidade;
    }

    public function getValorUnitario(): float
    {
        return $this->valorUnitario;
    }

    public function exibirDetalhes(): string
    {
        $valorTotal = $this->consultarValorTotal();
        return "
        <ul>
            <li>Nome: {$this->nome}</li>
            <li>Quantidade em Estoque: {$this->quantidade}</li>
            <li>Valor Unitário: R$ " . number_format($this->valorUnitario, 2, ',', '.') . "</li>
            <li>Valor Total em Estoque: R$ " . number_format($valorTotal, 2, ',', '.') . "</li>
        </ul>
        ";
    }
}
?>