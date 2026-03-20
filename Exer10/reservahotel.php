<?php
class ReservaHotel
{
    private string $nomeHospede;
    private int $numeroNoites;
    private string $tipoQuarto;

    private array $precos = [
        'simples' => 120,
        'luxo' => 200,
        'suite' => 350
    ];

    public function __construct(string $nomeHospede, int $numeroNoites, string $tipoQuarto)
    {
        $this->nomeHospede = $nomeHospede;
        $this->numeroNoites = $numeroNoites;
        $this->tipoQuarto = $tipoQuarto;
    }

    public function calcularValorTotal(): float
    {
        $precoDiaria = $this->precos[$this->tipoQuarto];
        $total = $precoDiaria * $this->numeroNoites;
        if ($this->numeroNoites > 5) {
            $total *= 0.9; // 10% discount
        }
        return $total;
    }

    public function mensagemBoasVindas(): string
    {
        return "Bem-vindo, {$this->nomeHospede}! Aproveite sua estadia.";
    }

    public function exibirDetalhes(): string
    {
        $total = $this->calcularValorTotal();
        $mensagem = $this->mensagemBoasVindas();

        return "
        <p>{$mensagem}</p>
        <ul>
            <li>Nome do Hóspede: {$this->nomeHospede}</li>
            <li>Número de Noites: {$this->numeroNoites}</li>
            <li>Tipo de Quarto: {$this->tipoQuarto}</li>
            <li>Valor Total: R$ " . number_format($total, 2, ',', '.') . "</li>
        </ul>
        ";
    }
}
?>