<?php require_once 'pedidorestaurante.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Conta do Restaurante</title>
</head>

<body>
    <h2>Divisão da Conta do Restaurante</h2>
    <form method="post">
        <label>Valor Total do Consumo (R$): <input type="number" step="0.01" name="consumo" required></label><br><br>
        <label>Número de Pessoas na Mesa: <input type="number" name="pessoas" required></label><br><br>
        <label>Couvert Artístico (R$): <input type="number" step="0.01" name="couvert" value="0"></label><br><br>
        <button type="submit">Dividir Conta</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $pedido = new PedidoRestaurante(
            (float)$_POST['consumo'],
            (int)$_POST['pessoas']
        );

        if (!empty($_POST['couvert'])) {
            $pedido->adicionarCouvert((float)$_POST['couvert']);
        }

        echo "<h3>Resultado:</h3>";
        echo $pedido->exibirConta();
    }
    ?>
</body>

</html>
