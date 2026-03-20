<?php
class Pessoa
{
    private string $nome;
    private float $peso;
    private float $altura;

    public function __construct(string $nome, float $peso, float $altura)
    {
        $this->nome = $nome;
        $this->peso = $peso;
        $this->altura = $altura;
    }

    public function calcularIMC(): float
    {
        return $this->peso / ($this->altura * $this->altura);
    }

    public function classificarIMC(): string
    {
        $imc = $this->calcularIMC();
        if ($imc < 18.5) {
            return "Abaixo do peso";
        } elseif ($imc < 25) {
            return "Normal";
        } elseif ($imc < 30) {
            return "Sobrepeso";
        } else {
            return "Obesidade";
        }
    }

    public function exibirDetalhes(): string
    {
        $imc = $this->calcularIMC();
        $classificacao = $this->classificarIMC();

        return "
        <ul>
            <li>Nome: {$this->nome}</li>
            <li>Peso: {$this->peso} kg</li>
            <li>Altura: {$this->altura} m</li>
            <li>IMC: " . number_format($imc, 2, ',', '.') . "</li>
            <li>Classificação: {$classificacao}</li>
        </ul>
        ";
    }
}
?>