<?php require_once 'viagem.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Classe Viagem - Planejamento e Custos</title>
</head>

<body>
    <h2>Planejamento de Viagem</h2>
    <form method="post">
        <label>Origem: <input type="text" name="origem" required></label><br><br>
        <label>Destino: <input type="text" name="destino" required></label><br><br>
        <label>Distância (km): <input type="number" step="0.01" name="distancia" required></label><br><br>
        <label>Tempo Estimado (horas): <input type="number" step="0.01" name="tempoEstimado" required></label><br><br>
        <label>Consumo do Veículo (km/l): <input type="number" step="0.01" name="consumoVeiculo" required></label><br><br>
        <label>Preço do Combustível (R$/litro): <input type="number" step="0.01" name="precoCombustivel" required></label><br><br>
        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $viagem = new Viagem(
            $_POST['origem'],
            $_POST['destino'],
            (float)$_POST['distancia'],
            (float)$_POST['tempoEstimado'],
            (float)$_POST['consumoVeiculo'],
            (float)$_POST['precoCombustivel']
        );

        echo "<h3>Detalhes da Viagem:</h3>";
        echo $viagem->exibirDetalhes();
    }
    ?>
</body>

</html>