<?php
class PedidoRestaurante
{
    private float $valorConsumo;
    private float $taxaServico = 0.10; // 10%
    private int $numeroPessoas;
    private float $couvert = 0;

    public function __construct(float $valorConsumo, int $numeroPessoas)
    {
        $this->valorConsumo = $valorConsumo;
        $this->numeroPessoas = $numeroPessoas;
    }

    public function adicionarCouvert(float $valor): void
    {
        $this->couvert = $valor;
    }

    public function calcularTaxaServico(): float
    {
        return $this->valorConsumo * $this->taxaServico;
    }

    public function totalComTaxas(): float
    {
        return $this->valorConsumo + $this->calcularTaxaServico() + $this->couvert;
    }

    public function dividirConta(): float
    {
        return $this->totalComTaxas() / $this->numeroPessoas;
    }

    public function exibirConta(): string
    {
        $taxa = $this->calcularTaxaServico();
        $total = $this->totalComTaxas();
        $porPessoa = $this->dividirConta();

        return "
        <div style='border: 1px solid #ccc; padding: 15px; margin: 10px 0; background-color: #f9f9f9;'>
            <h3>CONTA DO RESTAURANTE</h3>
            <ul>
                <li><strong>Consumo:</strong> R$ " . number_format($this->valorConsumo, 2, ',', '.') . "</li>
                <li><strong>Taxa de Serviço (10%):</strong> R$ " . number_format($taxa, 2, ',', '.') . "</li>
                <li><strong>Couvert Artístico:</strong> R$ " . number_format($this->couvert, 2, ',', '.') . "</li>
                <hr>
                <li style='color: blue; font-weight: bold;'><strong>TOTAL:</strong> R$ " . number_format($total, 2, ',', '.') . "</li>
                <li><strong>Número de Pessoas:</strong> {$this->numeroPessoas}</li>
                <hr>
                <li style='color: green; font-weight: bold;'><strong>VALOR POR PESSOA:</strong> R$ " . number_format($porPessoa, 2, ',', '.') . "</li>
            </ul>
        </div>
        ";
    }
}
?>
