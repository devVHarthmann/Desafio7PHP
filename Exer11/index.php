<?php require_once 'calculadorageometrica.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Calculadora Geométrica - Área de figuras</title>
</head>

<body>
    <h2>Cálculo de Área</h2>
    <form method="post">
        <label>Figura:
            <select name="figura" id="figura" required>
                <option value="quadrado">Quadrado</option>
                <option value="retangulo">Retângulo</option>
                <option value="circulo">Círculo</option>
            </select>
        </label><br><br>
        <div id="inputs">
            <label>Lado/Base/Raio: <input type="number" step="0.01" name="medida1" required></label><br><br>
            <label id="label2" style="display:none;">Altura: <input type="number" step="0.01" name="medida2"></label><br><br>
        </div>
        <button type="submit">Calcular</button>
    </form>

    <script>
        document.getElementById('figura').addEventListener('change', function() {
            var figura = this.value;
            var label2 = document.getElementById('label2');
            if (figura === 'retangulo') {
                label2.style.display = 'block';
                label2.querySelector('input').required = true;
            } else {
                label2.style.display = 'none';
                label2.querySelector('input').required = false;
            }
        });
    </script>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $medida2 = isset($_POST['medida2']) && $_POST['medida2'] !== '' ? (float)$_POST['medida2'] : null;
        $calc = new CalculadoraGeometrica(
            $_POST['figura'],
            (float)$_POST['medida1'],
            $medida2
        );

        echo "<h3>Resultado:</h3>";
        echo $calc->exibirResultado();
    }
    ?>
</body>

</html>