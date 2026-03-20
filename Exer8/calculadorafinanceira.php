<?php
class CalculadoraFinanceira
{
    private float $valorCompra;
    private int $numeroParcelas;
    private float $taxaJurosMensal;

    public function __construct(float $valorCompra, int $numeroParcelas, float $taxaJurosMensal)
    {
        $this->valorCompra = $valorCompra;
        $this->numeroParcelas = $numeroParcelas;
        $this->taxaJurosMensal = $taxaJurosMensal / 100; // assume input as percentage
    }

    public function calcularTotalPagar(): float
    {
        return $this->valorCompra * pow(1 + $this->taxaJurosMensal, $this->numeroParcelas);
    }

    public function calcularValorParcela(): float
    {
        return $this->calcularTotalPagar() / $this->numeroParcelas;
    }

    public function calcularJurosPagos(): float
    {
        return $this->calcularTotalPagar() - $this->valorCompra;
    }

    public function exibirDetalhes(): string
    {
        $total = $this->calcularTotalPagar();
        $parcela = $this->calcularValorParcela();
        $juros = $this->calcularJurosPagos();

        return "
        <ul>
            <li>Valor da Compra: R$ " . number_format($this->valorCompra, 2, ',', '.') . "</li>
            <li>Número de Parcelas: {$this->numeroParcelas}</li>
            <li>Taxa de Juros Mensal: " . ($this->taxaJurosMensal * 100) . "%</li>
            <li>Valor da Parcela: R$ " . number_format($parcela, 2, ',', '.') . "</li>
            <li>Total a Pagar: R$ " . number_format($total, 2, ',', '.') . "</li>
            <li>Juros Pagos: R$ " . number_format($juros, 2, ',', '.') . "</li>
        </ul>
        ";
    }
}
?>