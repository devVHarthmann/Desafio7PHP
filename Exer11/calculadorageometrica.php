<?php
class CalculadoraGeometrica
{
    private string $figura;
    private float $medida1; // lado for quadrado, base for retangulo, raio for circulo
    private float $medida2; // altura for retangulo, null for others

    public function __construct(string $figura, float $medida1, ?float $medida2 = null)
    {
        $this->figura = $figura;
        $this->medida1 = $medida1;
        $this->medida2 = $medida2;
    }

    public function calcularArea(): float
    {
        switch ($this->figura) {
            case 'quadrado':
                return $this->medida1 * $this->medida1;
            case 'retangulo':
                return $this->medida1 * $this->medida2;
            case 'circulo':
                return pi() * $this->medida1 * $this->medida1;
            default:
                return 0;
        }
    }

    public function exibirResultado(): string
    {
        $area = $this->calcularArea();
        return "
        <ul>
            <li>Figura: {$this->figura}</li>
            <li>Área: " . number_format($area, 2, ',', '.') . " unidades²</li>
        </ul>
        ";
    }
}
?>