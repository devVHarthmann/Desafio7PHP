<?php require_once 'aluno.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cálculo de média e status</title>
</head>

<body>
    <h2>Informações do Aluno</h2>
    <form method="post">
        <label>Nome: <input type="text" name="nome" required></label><br><br>
        <label>Disciplina: <input type="text" name="disciplina" required></label><br><br>
        <label>Nota 1: <input type="number" step="0.01" name="n1" required></label><br><br>
        <label>Nota 2: <input type="number" step="0.01" name="n2" required></label><br><br>
        <label>Nota 3: <input type="number" step="0.01" name="n3" required></label><br><br>

        <button type="submit">Calcular</button>
    </form>


    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $n1 = $_POST['n1'];
        $n2 = $_POST['n2'];
        $n3 = $_POST['n3'];
        if ($n1 >= 0 && $n1 <= 10 && $n2 >= 0 && $n2 <= 10 && $n3 >= 0 && $n3 <= 10) {
            $aluno = new Aluno(
                $_POST['nome'],
                $_POST['disciplina'],
                (float)$_POST['n1'],
                (float)$_POST['n2'],
                (float)$_POST['n3']
            );


            echo "<h3>Resultado:</h3>";
            echo $aluno->calcularMedia($n1, $n2, $n3);
        } else{
            echo "As notas devem ser números entre 0 e 10";
        }
    }
    ?>
</body>

</html>