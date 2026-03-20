<?php
session_start();
require_once 'produto.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['criar'])) {
        $produto = new Produto(
            $_POST['nome'],
            (int)$_POST['quantidade'],
            (float)$_POST['valorUnitario']
        );
        $_SESSION['produto'] = serialize($produto);
    } elseif (isset($_SESSION['produto'])) {
        $produto = unserialize($_SESSION['produto']);
        if (isset($_POST['entrada'])) {
            $qtd = (int)$_POST['qtdMov'];
            $produto->entradaEstoque($qtd);
        } elseif (isset($_POST['saida'])) {
            $qtd = (int)$_POST['qtdMov'];
            $produto->saidaEstoque($qtd);
        }
        $_SESSION['produto'] = serialize($produto);
    }
}

$produto = isset($_SESSION['produto']) ? unserialize($_SESSION['produto']) : null;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Classe Produto - Controle de Estoque</title>
</head>

<body>
    <h2>Controle de Estoque de Produto</h2>

    <?php if (!$produto): ?>
        <form method="post">
            <label>Nome: <input type="text" name="nome" required></label><br><br>
            <label>Quantidade Inicial: <input type="number" name="quantidade" required></label><br><br>
            <label>Valor Unitário: <input type="number" step="0.01" name="valorUnitario" required></label><br><br>
            <button type="submit" name="criar">Criar Produto</button>
        </form>
    <?php else: ?>
        <h3>Produto Atual:</h3>
        <?php echo $produto->exibirDetalhes(); ?>

        <h3>Movimentações:</h3>
        <form method="post" style="display: inline;">
            <label>Quantidade para Entrada: <input type="number" name="qtdMov" required></label>
            <button type="submit" name="entrada">Entrada no Estoque</button>
        </form>
        <br><br>
        <form method="post" style="display: inline;">
            <label>Quantidade para Saída: <input type="number" name="qtdMov" required></label>
            <button type="submit" name="saida">Saída do Estoque</button>
        </form>
        <br><br>
        <a href="?reset=1">Resetar Produto</a>
    <?php endif; ?>

    <?php
    if (isset($_GET['reset'])) {
        unset($_SESSION['produto']);
        header("Location: index.php");
    }
    ?>
</body>

</html>