<?php
class ConversorMoeda
{
    private float $valorReais;
    private string $moedaDestino;
    private float $cotacao;

    public function __construct(float $valorReais, string $moedaDestino, float $cotacao)
    {
        $this->valorReais = $valorReais;
        $this->moedaDestino = $moedaDestino;
        $this->cotacao = $cotacao;
    }

    public function converter(): float
    {
        return $this->valorReais / $this->cotacao;
    }

    public function getSimbolo(): string
    {
        switch ($this->moedaDestino) {
            case 'USD':
                return '$';
            case 'EUR':
                return '€';
            default:
                return '';
        }
    }

    public function exibirConversao(): string
    {
        $valorConvertido = $this->converter();
        $simbolo = $this->getSimbolo();
        $valorFormatado = number_format($valorConvertido, 2, '.', ',');

        return "
        <ul>
            <li>Valor em Reais: R$ " . number_format($this->valorReais, 2, ',', '.') . "</li>
            <li>Moeda Destino: {$this->moedaDestino}</li>
            <li>Cotação: {$this->cotacao} BRL por {$this->moedaDestino}</li>
            <li>Valor Convertido: {$simbolo} {$valorFormatado}</li>
        </ul>
        ";
    }
}
?>