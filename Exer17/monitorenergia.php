<?php
class MonitorEnergia
{
    private float $leituraAnterior;
    private float $leituraAtual;
    private string $corbandeira;
    private float $tarifa = 0;

    public function __construct(float $leituraAnterior, float $leituraAtual, string $corbandeira)
    {
        $this->leituraAnterior = $leituraAnterior;
        $this->leituraAtual = $leituraAtual;
        $this->corbandeira = strtolower($corbandeira);
    }

    public function calcularConsumo(): float
    {
        return $this->leituraAtual - $this->leituraAnterior;
    }

    public function definirTarifa(): float
    {
        switch ($this->corbandeira) {
            case 'verde':
                $this->tarifa = 0.50;
                break;
            case 'amarela':
                $this->tarifa = 0.65;
                break;
            case 'vermelha':
                $this->tarifa = 0.80;
                break;
            default:
                $this->tarifa = 0.50;
        }
        return $this->tarifa;
    }

    public function calcularValorTotal(): float
    {
        $consumo = $this->calcularConsumo();
        $this->definirTarifa();
        return $consumo * $this->tarifa;
    }

    public function exibirFatura(): string
    {
        $consumo = $this->calcularConsumo();
        $this->definirTarifa();
        $valorTotal = $this->calcularValorTotal();

        $corBandeira = match($this->corbandeira) {
            'verde' => '#008000',
            'amarela' => '#FFD700',
            'vermelha' => '#FF0000',
            default => '#000000'
        };

        return "
        <div style='border: 1px solid $corBandeira; padding: 15px; margin: 10px 0; background-color: #f9f9f9;'>
            <h3>FATURA DE ENERGIA ELÉTRICA</h3>
            <ul>
                <li><strong>Leitura Anterior:</strong> {$this->leituraAnterior} KWh</li>
                <li><strong>Leitura Atual:</strong> {$this->leituraAtual} KWh</li>
                <li><strong>Consumo do Mês:</strong> {$consumo} KWh</li>
                <hr>
                <li><strong>Bandeira Tarifária:</strong> <span style='color: $corBandeira; font-weight: bold;'>" . ucfirst($this->corbandeira) . "</span></li>
                <li><strong>Valor do KWh:</strong> R$ " . number_format($this->tarifa, 2, ',', '.') . "</li>
                <hr>
                <li style='color: $corBandeira; font-weight: bold;'><strong>VALOR TOTAL A PAGAR:</strong> R$ " . number_format($valorTotal, 2, ',', '.') . "</li>
            </ul>
        </div>
        ";
    }
}
?>
