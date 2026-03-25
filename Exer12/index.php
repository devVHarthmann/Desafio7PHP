<?php require_once 'locadoraveiculo.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Locadora de Veículos</title>
</head>

<body>
    <h2>Aluguel de Veículos</h2>
    <form method="post">
        <label>Modelo do Carro: <input type="text" name="modelo" required></label><br><br>
        <label>Valor da Diária (R$): <input type="number" step="0.01" name="valorDiaria" required></label><br><br>
        <label>KM Inicial: <input type="number" step="0.01" name="kmInicial" required></label><br><br>
        <label>KM Final: <input type="number" step="0.01" name="kmFinal" required></label><br><br>
        <label>Quantidade de Dias: <input type="number" name="dias" required></label><br><br>
        <label>Limite de KM Grátis: <input type="number" step="0.01" name="limiteGratis" required></label><br><br>
        <label>Valor por KM Excedente (R$): <input type="number" step="0.01" name="valorPorKm" required></label><br><br>
        <button type="submit">Calcular Aluguel</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $locadora = new LocadoraVeiculo(
            $_POST['modelo'],
            (float)$_POST['valorDiaria'],
            (float)$_POST['kmInicial'],
            (float)$_POST['kmFinal']
        );

        echo "<h3>Resultado:</h3>";
        echo $locadora->gerarFatura(
            (int)$_POST['dias'],
            (float)$_POST['limiteGratis'],
            (float)$_POST['valorPorKm']
        );
    }
    ?>
</body>

</html>
