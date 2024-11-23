<?php
// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Coletar os dados enviados pelo formulário
    $comodoLargura = isset($_POST['comodo-largura']) ? floatval($_POST['comodo-largura']) : 0;
    $comodoComprimento = isset($_POST['comodo-comprimento']) ? floatval($_POST['comodo-comprimento']) : 0;
    $pisoLargura = isset($_POST['piso-largura']) ? floatval($_POST['piso-largura']) : 0;
    $pisoComprimento = isset($_POST['piso-comprimento']) ? floatval($_POST['piso-comprimento']) : 0;
    $margem = isset($_POST['margem']) ? floatval($_POST['margem']) : 0;

    // Realizar os cálculos
    $areaComodo = $comodoLargura * $comodoComprimento;
    $areaPiso = $pisoLargura * $pisoComprimento;
    $quantidadePiso = $areaComodo / $areaPiso;
    $margemCalculada = $quantidadePiso * ($margem / 100);
    $quantidadeTotal = $quantidadePiso + $margemCalculada;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculo de Materiais</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <style>
        body{background-color: blue;}
        h1{color: white;}
        legend{color: red;font-size: 20px;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;}
        p{color: white;}
        label{color: white;text-shadow: 9px;font-size: 20px;font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;font-style: inherit;}
    </style>

<main>
    <h1 class="text-center">Calculadora de Materiais</h1>
    <div class="container">
        <form method="POST" class="row g-2">
            <fildset class="row g-2">
                <legend>Cômodo</legend>
                    <div class="col-md-6">
                        <label for="comodo-largura" class="form-label">Largura</label>
                        <input type="number" class="form-control" id="comodo-largura" name="comodo-largura" value="<?= isset($comodoLargura) ? $comodoLargura : '' ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="comodo-comprimento" class="form-label">Comprimento</label>
                        <input type="number" class="form-control" id="comodo-comprimento" name="comodo-comprimento" value="<?= isset($comodoComprimento) ? $comodoComprimento : '' ?>" required>
                    </div>
            </fildset>
            <fildset class="row g-2">
                <legend>Piso</legend>
                    <div class="col-md-6">
                        <label for="piso-largura" class="form-label">Largura</label>
                        <input type="number" class="form-control" id="piso-largura" name="piso-largura" value="<?= isset($pisoLargura) ? $pisoLargura : '' ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="piso-comprimento" class="form-label">Comprimento</label>
                        <input type="number" class="form-control" id="piso-comprimento" name="piso-comprimento" value="<?= isset($pisoComprimento) ? $pisoComprimento : '' ?>" required>
                    </div>
            </fildset>
            <div class="col-md-12">
                <label for="margem" class="form-label">Margem (%)</label>
                <input type="number" class="form-control" id="margem" name="margem" value="<?= isset($margem) ? $margem : '' ?>" required>
            </div>
            <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Calcular</button>
            </div>
        </form>

        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
        <div class="col-md-12 mt-4">
            <h4 class="text-white">Resultados:</h4>
            <p><strong>Área do Cômodo:</strong> <?= number_format($areaComodo, 2) ?> m²</p>
            <p><strong>Área do Piso:</strong> <?= number_format($areaPiso, 2) ?> m²</p>
            <p><strong>Quantidade de Pisos (sem margem):</strong> <?= number_format($quantidadePiso, 2) ?></p>
            <p><strong>Margem:</strong> <?= number_format($margemCalculada, 2) ?></p>
            <p><strong>Quantidade Total (com margem):</strong> <?= number_format($quantidadeTotal, 2) ?></p>
        </div>
        <?php endif; ?>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
