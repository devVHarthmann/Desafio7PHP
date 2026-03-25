<?php
class DesempenhoVendas
{
    private string $nomeVendedor;
    private float $salarioBase;
    private float $totalVendas;

    public function __construct(string $nomeVendedor, float $salarioBase, float $totalVendas)
    {
        $this->nomeVendedor = $nomeVendedor;
        $this->salarioBase = $salarioBase;
        $this->totalVendas = $totalVendas;
    }

    public function calcularComissao(): float
    {
        return $this->totalVendas * 0.05; // 5%
    }

    public function verificarMeta(float $meta): float
    {
        if ($this->totalVendas > $meta) {
            return 500.00; // Bônus fixo
        }
        return 0;
    }

    public function getSalarioFinal(float $meta): float
    {
        $comissao = $this->calcularComissao();
        $bonus = $this->verificarMeta($meta);
        return $this->salarioBase + $comissao + $bonus;
    }

    public function exibirContraCheque(float $meta): string
    {
        $comissao = $this->calcularComissao();
        $bonus = $this->verificarMeta($meta);
        $salarioFinal = $this->getSalarioFinal($meta);

        $statusMeta = $this->totalVendas > $meta ? "✓ Atingida" : "✗ Não Atingida";

        return "
        <div style='border: 1px solid #ccc; padding: 15px; margin: 10px 0; background-color: #f9f9f9;'>
            <h3>CONTRA-CHEQUE</h3>
            <ul>
                <li><strong>Vendedor:</strong> {$this->nomeVendedor}</li>
                <li><strong>Salário Base:</strong> R$ " . number_format($this->salarioBase, 2, ',', '.') . "</li>
                <hr>
                <li><strong>Total Vendido:</strong> R$ " . number_format($this->totalVendas, 2, ',', '.') . "</li>
                <li><strong>Meta:</strong> R$ " . number_format($meta, 2, ',', '.') . "</li>
                <li><strong>Status da Meta:</strong> $statusMeta</li>
                <hr>
                <li><strong>Comissão (5%):</strong> R$ " . number_format($comissao, 2, ',', '.') . "</li>
                <li><strong>Bônus por Meta:</strong> R$ " . number_format($bonus, 2, ',', '.') . "</li>
                <hr>
                <li style='color: green; font-weight: bold;'><strong>SALÁRIO LÍQUIDO:</strong> R$ " . number_format($salarioFinal, 2, ',', '.') . "</li>
            </ul>
        </div>
        ";
    }
}
?>
