<?php require_once 'carro.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Classe Carro - Autonomia e Revisão</title>
</head>

<body>
    <h2>Informações do Carro</h2>
    <form method="post">
        <label>Modelo: <input type="text" name="modelo" required></label><br><br>
        <label>Combustível:
            <select name="combustivel" required>
                <option value="etanol">Etanol</option>
                <option value="gasolina">Gasolina</option>
            </select>
        </label><br><br>
        <label>Tanque Cheio (litros): <input type="number" step="0.01" name="tanqueLitros" required></label><br><br>
        <label>Consumo (km/l): <input type="number" step="0.01" name="consumoKmL" required></label><br><br>
        <label>Preço do Combustível (R$/litro): <input type="number" step="0.01" name="precoCombustivel" required></label><br><br>
        <label>Km Rodados: <input type="number" step="0.01" name="kmRodados" required></label><br><br>
        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $carro = new Carro(
            $_POST['modelo'],
            $_POST['combustivel'],
            (float)$_POST['tanqueLitros'],
            (float)$_POST['consumoKmL'],
            (float)$_POST['precoCombustivel'],
            (float)$_POST['kmRodados']
        );

        echo "<h3>Resultado:</h3>";
        echo $carro->exibirDetalhes();
    }
    ?>
</body>

</html>