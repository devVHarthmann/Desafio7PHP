<?php
class ClubeFidelidade
{
    private string $nomeCliente;
    private float $saldoPontos = 0;
    private float $valorCompra;

    public function __construct(string $nomeCliente, float $valorCompra)
    {
        $this->nomeCliente = $nomeCliente;
        $this->valorCompra = $valorCompra;
    }

    public function converterParaPontos(): float
    {
        // Cada R$ 10,00 = 1 ponto
        $pontos = intval($this->valorCompra / 10);
        $this->saldoPontos += $pontos;
        return $pontos;
    }

    public function verificarResgate(float $custoBrinde): string
    {
        if ($this->saldoPontos >= $custoBrinde) {
            return "Resgate Autorizado";
        }
        return "Pontos Insuficientes";
    }

    public function aplicarResgate(float $custoBrinde): bool
    {
        if ($this->verificarResgate($custoBrinde) === "Resgate Autorizado") {
            $this->saldoPontos -= $custoBrinde;
            return true;
        }
        return false;
    }

    public function getSaldoPontos(): float
    {
        return $this->saldoPontos;
    }

    public function extrato(): string
    {
        // Cada ponto vale R$ 0,50 de desconto
        $equivalenteReais = $this->saldoPontos * 0.50;

        return "
        <div style='border: 1px solid #ccc; padding: 15px; margin: 10px 0; background-color: #f9f9f9;'>
            <h3>EXTRATO DO CLUBE DE FIDELIDADE</h3>
            <ul>
                <li><strong>Cliente:</strong> {$this->nomeCliente}</li>
                <li><strong>Valor da Última Compra:</strong> R$ " . number_format($this->valorCompra, 2, ',', '.') . "</li>
                <li><strong>Pontos Acumulados Nesta Compra:</strong> " . intval($this->valorCompra / 10) . " pontos</li>
                <hr>
                <li><strong>Saldo de Pontos:</strong> {$this->saldoPontos} pontos</li>
                <li><strong>Equivalente em Reais (R$ 0,50/ponto):</strong> R$ " . number_format($equivalenteReais, 2, ',', '.') . "</li>
                <li style='color: blue;'><em>Use seus pontos para resgatar brindes e aproveitar descontos!</em></li>
            </ul>
        </div>
        ";
    }
}
?>
