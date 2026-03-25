<?php require_once 'desempenhovendas.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Desempenho de Vendas</title>
</head>

<body>
    <h2>Cálculo de Salário e Comissões</h2>
    <form method="post">
        <label>Nome do Vendedor: <input type="text" name="nomeVendedor" required></label><br><br>
        <label>Salário Base (R$): <input type="number" step="0.01" name="salarioBase" required></label><br><br>
        <label>Total de Vendas no Mês (R$): <input type="number" step="0.01" name="totalVendas" required></label><br><br>
        <label>Meta de Vendas (R$): <input type="number" step="0.01" name="meta" required></label><br><br>
        <button type="submit">Calcular Salário</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $vendedor = new DesempenhoVendas(
            $_POST['nomeVendedor'],
            (float)$_POST['salarioBase'],
            (float)$_POST['totalVendas']
        );

        echo "<h3>Resultado:</h3>";
        echo $vendedor->exibirContraCheque((float)$_POST['meta']);
    }
    ?>
</body>

</html>
