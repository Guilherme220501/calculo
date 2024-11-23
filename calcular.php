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

    // Enviar os resultados para a página de volta
    header('Location: index.php?areaComodo=' . urlencode(number_format($areaComodo, 2)) . 
    '&areaPiso=' . urlencode(number_format($areaPiso, 2)) .'&quantidadePiso=' . urlencode(number_format($quantidadePiso, 2)) . 
    '&margemCalculada=' . urlencode(number_format($margemCalculada, 2)) . 
    '&quantidadeTotal=' . urlencode(number_format($quantidadeTotal, 2)));
    exit;
}
?>
