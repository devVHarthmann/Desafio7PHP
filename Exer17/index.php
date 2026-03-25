<?php require_once 'monitorenergia.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Monitor de Energia</title>
</head>

<body>
    <h2>Cálculo de Conta de Energia Elétrica</h2>
    <form method="post">
        <label>Leitura Anterior (KWh): <input type="number" step="0.01" name="leituraAnterior" required></label><br><br>
        <label>Leitura Atual (KWh): <input type="number" step="0.01" name="leituraAtual" required></label><br><br>
        <label>Bandeira Tarifária:
            <select name="corbandeira" required>
                <option value="">Selecione a bandeira</option>
                <option value="verde">Verde - R$ 0,50/KWh</option>
                <option value="amarela">Amarela - R$ 0,65/KWh</option>
                <option value="vermelha">Vermelha - R$ 0,80/KWh</option>
            </select>
        </label><br><br>
        <button type="submit">Calcular Fatura</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $monitor = new MonitorEnergia(
            (float)$_POST['leituraAnterior'],
            (float)$_POST['leituraAtual'],
            $_POST['corbandeira']
        );

        echo "<h3>Resultado:</h3>";
        echo $monitor->exibirFatura();
    }
    ?>
</body>

</html>
