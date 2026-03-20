<?php require_once 'calculadorafinanceira.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Calculadora Financeira - Parcelamento e Juros</title>
</head>

<body>
    <h2>Cálculo de Parcelamento</h2>
    <form method="post">
        <label>Valor da Compra: <input type="number" step="0.01" name="valorCompra" required></label><br><br>
        <label>Número de Parcelas: <input type="number" name="numeroParcelas" required></label><br><br>
        <label>Taxa de Juros Mensal (%): <input type="number" step="0.01" name="taxaJurosMensal" required></label><br><br>
        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $calc = new CalculadoraFinanceira(
            (float)$_POST['valorCompra'],
            (int)$_POST['numeroParcelas'],
            (float)$_POST['taxaJurosMensal']
        );

        echo "<h3>Resultado:</h3>";
        echo $calc->exibirDetalhes();
    }
    ?>
</body>

</html>