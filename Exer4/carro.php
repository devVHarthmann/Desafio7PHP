<?php
class Carro
{
    private string $modelo;
    private string $combustivel;
    private float $tanqueLitros;
    private float $consumoKmL;
    private float $precoCombustivel;
    private float $kmRodados;

    public function __construct(string $modelo, string $combustivel, float $tanqueLitros, float $consumoKmL, float $precoCombustivel, float $kmRodados)
    {
        $this->modelo = $modelo;
        $this->combustivel = $combustivel;
        $this->tanqueLitros = $tanqueLitros;
        $this->consumoKmL = $consumoKmL;
        $this->precoCombustivel = $precoCombustivel;
        $this->kmRodados = $kmRodados;
    }

    public function calcularAutonomia(): float
    {
        return $this->tanqueLitros * $this->consumoKmL;
    }

    public function calcularCustoPorKm(): float
    {
        return $this->precoCombustivel / $this->consumoKmL;
    }

    public function verificarRevisao(): string
    {
        return $this->kmRodados >= 10000 ? "Sim, é hora da revisão." : "Não, ainda não é hora da revisão.";
    }

    public function exibirDetalhes(): string
    {
        $autonomia = $this->calcularAutonomia();
        $custoPorKm = $this->calcularCustoPorKm();
        $revisao = $this->verificarRevisao();

        return "
        <ul>
            <li>Modelo: {$this->modelo}</li>
            <li>Combustível: {$this->combustivel}</li>
            <li>Tanque Cheio: {$this->tanqueLitros} litros</li>
            <li>Consumo: {$this->consumoKmL} km/l</li>
            <li>Preço do Combustível: R$ " . number_format($this->precoCombustivel, 2, ',', '.') . "</li>
            <li>Km Rodados: {$this->kmRodados} km</li>
            <li>Autonomia: {$autonomia} km</li>
            <li>Custo por Km: R$ " . number_format($custoPorKm, 2, ',', '.') . "</li>
            <li>Revisão: {$revisao}</li>
        </ul>
        ";
    }
}
?>