<?php require_once 'clubefidelidade.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Clube de Fidelidade</title>
</head>

<body>
    <h2>Clube de Fidelidade - Pontuação e Resgate</h2>
    <form method="post">
        <h3>Dados do Cliente</h3>
        <label>Nome do Cliente: <input type="text" name="nomeCliente" required></label><br><br>
        <label>Valor da Compra (R$): <input type="number" step="0.01" name="valorCompra" min="0" required></label><br><br>
        
        <h3>Resgate de Brinde</h3>
        <label>Custo do Brinde (em pontos): <input type="number" name="custoBrinde" min="0"></label><br><br>
        
        <button type="submit">Processar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $cliente = new ClubeFidelidade(
            $_POST['nomeCliente'],
            (float)$_POST['valorCompra']
        );

        // Converter valor da compra em pontos
        $pontosGanhos = $cliente->converterParaPontos();

        echo "<h3>Resultado:</h3>";
        echo $cliente->extrato();

        // Se informou custo do brinde, fazer resgate
        if (!empty($_POST['custoBrinde']) && (int)$_POST['custoBrinde'] > 0) {
            $custoBrinde = (int)$_POST['custoBrinde'];
            $statusResgate = $cliente->verificarResgate($custoBrinde);

            $cor = $statusResgate === "Resgate Autorizado" ? "green" : "red";

            echo "
            <div style='border: 2px solid $cor; padding: 15px; margin: 20px 0; background-color: #f9f9f9;'>
                <h3>VERIFICAÇÃO DE RESGATE</h3>
                <ul>
                    <li><strong>Brinde Solicitado:</strong> $custoBrinde pontos</li>
                    <li><strong>Status:</strong> <span style='color: $cor; font-weight: bold;'>$statusResgate</span></li>";

            if ($cliente->aplicarResgate($custoBrinde)) {
                echo "<li><strong>Saldo Restante:</strong> " . $cliente->getSaldoPontos() . " pontos</li>";
            }

            echo "</ul>
            </div>";
        }
    }
    ?>
</body>

</html>
