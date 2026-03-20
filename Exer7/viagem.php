<?php
class Viagem
{
    private string $origem;
    private string $destino;
    private float $distancia;
    private float $tempoEstimado;
    private float $consumoVeiculo;
    private float $precoCombustivel;

    public function __construct(string $origem, string $destino, float $distancia, float $tempoEstimado, float $consumoVeiculo, float $precoCombustivel)
    {
        $this->origem = $origem;
        $this->destino = $destino;
        $this->distancia = $distancia;
        $this->tempoEstimado = $tempoEstimado;
        $this->consumoVeiculo = $consumoVeiculo;
        $this->precoCombustivel = $precoCombustivel;
    }

    public function calcularVelocidadeMedia(): float
    {
        return $this->distancia / $this->tempoEstimado;
    }

    public function calcularConsumoEstimado(): float
    {
        return $this->distancia / $this->consumoVeiculo;
    }

    public function calcularCustoViagem(): float
    {
        return $this->calcularConsumoEstimado() * $this->precoCombustivel;
    }

    public function exibirDetalhes(): string
    {
        $velocidade = $this->calcularVelocidadeMedia();
        $consumo = $this->calcularConsumoEstimado();
        $custo = $this->calcularCustoViagem();

        return "
        <ul>
            <li>Origem: {$this->origem}</li>
            <li>Destino: {$this->destino}</li>
            <li>Distância: {$this->distancia} km</li>
            <li>Tempo Estimado: {$this->tempoEstimado} horas</li>
            <li>Consumo do Veículo: {$this->consumoVeiculo} km/l</li>
            <li>Preço do Combustível: R$ " . number_format($this->precoCombustivel, 2, ',', '.') . "/l</li>
            <li>Velocidade Média: {$velocidade} km/h</li>
            <li>Consumo Estimado: {$consumo} litros</li>
            <li>Custo da Viagem: R$ " . number_format($custo, 2, ',', '.') . "</li>
        </ul>
        ";
    }
}
?>