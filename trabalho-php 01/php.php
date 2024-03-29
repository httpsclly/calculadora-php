<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $salarioHora = isset($_POST['salarioHora']) ? $_POST['salarioHora'] : 0;
    $horasTrabalhadas = isset($_POST['horasTrabalhadas']) ? $_POST['horasTrabalhadas'] : 0;

    $salarioBruto = $salarioHora * $horasTrabalhadas;
    $impostoRenda = $salarioBruto * 0.11;
    $inss = $salarioBruto * 0.08;
    $sindicato = $salarioBruto * 0.05;
    $salarioLiquido = $salarioBruto - ($impostoRenda + $inss + $sindicato);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Salário</title>
</head>
<body>
    <h1>Calculadora de Salário</h1>
    <form method="post">
        <label for="salarioHora">Salário por hora:</label>
        <input type="number" name="salarioHora" id="salarioHora" step="0.01" value="<?php echo isset($salarioHora) ? $salarioHora : ''; ?>" required><br>
        <label for="horasTrabalhadas">Horas trabalhadas no mês:</label>
        <input type="number" name="horasTrabalhadas" id="horasTrabalhadas" value="<?php echo isset($horasTrabalhadas) ? $horasTrabalhadas : ''; ?>" required><br>
        <button type="submit">Calcular</button>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
        <h2>Resultados</h2>
        <p>Salário Bruto: R$ <?php echo number_format($salarioBruto, 2, ',', '.'); ?></p>
        <p>Imposto de Renda (11%): R$ <?php echo number_format($impostoRenda, 2, ',', '.'); ?></p>
        <p>INSS (8%): R$ <?php echo number_format($inss, 2, ',', '.'); ?></p>
        <p>Sindicato (5%): R$ <?php echo number_format($sindicato, 2, ',', '.'); ?></p>
        <p>Salário Líquido: R$ <?php echo number_format($salarioLiquido, 2, ',', '.'); ?></p>
    <?php } ?>
</body>
</html>
