<?php
class LocadoraVeiculo
{
    private string $modelo;
    private float $valorDiaria;
    private float $kmInicial;
    private float $kmFinal;

    public function __construct(string $modelo, float $valorDiaria, float $kmInicial, float $kmFinal)
    {
        $this->modelo = $modelo;
        $this->valorDiaria = $valorDiaria;
        $this->kmInicial = $kmInicial;
        $this->kmFinal = $kmFinal;
    }

    public function calcularDias(int $quantidade): float
    {
        return $quantidade * $this->valorDiaria;
    }

    public function calcularKmRodado(): float
    {
        return $this->kmFinal - $this->kmInicial;
    }

    public function calcularCustoExtra(float $limiteGratis, float $valorPorKm): float
    {
        $kmRodado = $this->calcularKmRodado();
        if ($kmRodado > $limiteGratis) {
            return ($kmRodado - $limiteGratis) * $valorPorKm;
        }
        return 0;
    }

    public function gerarFatura(int $dias, float $limiteGratis, float $valorPorKm): string
    {
        $custoBase = $this->calcularDias($dias);
        $kmRodado = $this->calcularKmRodado();
        $custoExtra = $this->calcularCustoExtra($limiteGratis, $valorPorKm);
        $totalGeral = $custoBase + $custoExtra;

        return "
        <div style='border: 1px solid #ccc; padding: 15px; margin: 10px 0; background-color: #f9f9f9;'>
            <h3>FATURA DE ALUGUEL</h3>
            <ul>
                <li><strong>Modelo do Carro:</strong> {$this->modelo}</li>
                <li><strong>Total de Dias:</strong> {$dias}</li>
                <li><strong>Valor da Diária:</strong> R$ " . number_format($this->valorDiaria, 2, ',', '.') . "</li>
                <li><strong>Custo Base (Diárias):</strong> R$ " . number_format($custoBase, 2, ',', '.') . "</li>
                <li><strong>KM Inicial:</strong> {$this->kmInicial} km</li>
                <li><strong>KM Final:</strong> {$this->kmFinal} km</li>
                <li><strong>KM Percorridos:</strong> {$kmRodado} km</li>
                <li><strong>Limite Grátis:</strong> {$limiteGratis} km</li>
                <li><strong>Valor por KM Excedente:</strong> R$ " . number_format($valorPorKm, 2, ',', '.') . "</li>
                <li><strong>Custo Extra (KM):</strong> R$ " . number_format($custoExtra, 2, ',', '.') . "</li>
                <hr>
                <li style='color: green; font-weight: bold;'><strong>TOTAL A PAGAR:</strong> R$ " . number_format($totalGeral, 2, ',', '.') . "</li>
            </ul>
        </div>
        ";
    }
}
?>
