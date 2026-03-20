<?php require_once 'conversormoeda.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Conversor de Moeda - Real x Dólar/Euro</title>
</head>

<body>
    <h2>Conversão de Moeda</h2>
    <form method="post">
        <label>Valor em Reais: <input type="number" step="0.01" name="valorReais" required></label><br><br>
        <label>Moeda Destino:
            <select name="moedaDestino" required>
                <option value="USD">Dólar (USD)</option>
                <option value="EUR">Euro (EUR)</option>
            </select>
        </label><br><br>
        <label>Cotação Atual (BRL por unidade da moeda destino): <input type="number" step="0.01" name="cotacao" required></label><br><br>
        <button type="submit">Converter</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $conversor = new ConversorMoeda(
            (float)$_POST['valorReais'],
            $_POST['moedaDestino'],
            (float)$_POST['cotacao']
        );

        echo "<h3>Resultado da Conversão:</h3>";
        echo $conversor->exibirConversao();
    }
    ?>
</body>

</html>