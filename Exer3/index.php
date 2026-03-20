<?php require_once 'pedido.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Pedidos</title>
</head>

<body>
    <h2>Informações do Produto</h2>
    <form method="post">
        <label>Nome: <input type="text" name="nome" required></label><br><br>
        <label>Quantidade: <input type="number" name="quant" required></label><br><br>
        <label>Preço unitário: <input type="number" step="0.01" name="precUnit" required></label><br><br>
        <label>Tipo de Cliente: <input type="text" step="0.01" name="typeC" required></label><br><br>

        <button type="submit">Calcular</button>
    </form>


    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $pedido = new Pedido(
            $_POST['nome'],
            $_POST['quant'],
            (float)$_POST['precUnit'],
            $_POST['typeC']
            
        );


        echo "<h3>Calculos:</h3>";
        echo $pedido->exibir();
    }
    ?>
</body>

</html>