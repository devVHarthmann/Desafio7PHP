<?php require_once 'reservahotel.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Classe ReservaHotel - Simulação de diária</title>
</head>

<body>
    <h2>Reserva de Hotel</h2>
    <form method="post">
        <label>Nome do Hóspede: <input type="text" name="nomeHospede" required></label><br><br>
        <label>Número de Noites: <input type="number" name="numeroNoites" required></label><br><br>
        <label>Tipo de Quarto:
            <select name="tipoQuarto" required>
                <option value="simples">Simples (R$ 120/noite)</option>
                <option value="luxo">Luxo (R$ 200/noite)</option>
                <option value="suite">Suíte (R$ 350/noite)</option>
            </select>
        </label><br><br>
        <button type="submit">Reservar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $reserva = new ReservaHotel(
            $_POST['nomeHospede'],
            (int)$_POST['numeroNoites'],
            $_POST['tipoQuarto']
        );

        echo "<h3>Detalhes da Reserva:</h3>";
        echo $reserva->exibirDetalhes();
    }
    ?>
</body>

</html>