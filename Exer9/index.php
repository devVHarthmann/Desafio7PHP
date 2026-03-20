<?php require_once 'pessoa.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Classe Pessoa - IMC e Classificação</title>
</head>

<body>
    <h2>Cálculo de IMC</h2>
    <form method="post">
        <label>Nome: <input type="text" name="nome" required></label><br><br>
        <label>Peso (kg): <input type="number" step="0.01" name="peso" required></label><br><br>
        <label>Altura (m): <input type="number" step="0.01" name="altura" required></label><br><br>
        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $pessoa = new Pessoa(
            $_POST['nome'],
            (float)$_POST['peso'],
            (float)$_POST['altura']
        );

        echo "<h3>Resultado:</h3>";
        echo $pessoa->exibirDetalhes();
    }
    ?>
</body>

</html>