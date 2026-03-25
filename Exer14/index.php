<?php require_once 'sistemalogin.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Sistema de Login</title>
</head>

<body>
    <h2>Validação de Acesso</h2>
    <form method="post">
        <label>Usuário Cadastrado: <input type="text" name="usuarioCadastrado" required></label><br><br>
        <label>Senha Cadastrada: <input type="password" name="senhaCadastrada" required></label><br><br>
        <h3>Tentativa de Login</h3>
        <label>Usuário: <input type="text" name="usuarioInformado" required></label><br><br>
        <label>Senha: <input type="password" name="senhaInformada" required></label><br><br>
        <button type="submit">Fazer Login</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $login = new SistemaLogin(
            $_POST['usuarioCadastrado'],
            $_POST['senhaCadastrada']
        );

        $status = $login->exibirStatus(
            $_POST['usuarioInformado'],
            $_POST['senhaInformada']
        );

        $statusConta = $login->verificarBloqueio();
        $tentativas = $login->getTentativas();

        $cor = $status === "Autorizado" ? "green" : "red";

        echo "
        <div style='border: 2px solid $cor; padding: 15px; margin: 20px 0; background-color: #f9f9f9;'>
            <h3>RESULTADO DO LOGIN</h3>
            <ul>
                <li><strong>Status:</strong> <span style='color: $cor; font-weight: bold;'>$status</span></li>
                <li><strong>Status da Conta:</strong> $statusConta</li>
                <li><strong>Tentativas Realizadas:</strong> $tentativas / 3</li>
            </ul>
        </div>
        ";
    }
    ?>
</body>

</html>
