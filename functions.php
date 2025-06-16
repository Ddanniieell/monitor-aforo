<?php
function contarAforoActual($pdo) {
    $stmt = $pdo->query("SELECT COUNT(*) FROM accesos WHERE tipo = 'entrada'");
    $entradas = $stmt->fetchColumn();

    $stmt = $pdo->query("SELECT COUNT(*) FROM accesos WHERE tipo = 'salida'");
    $salidas = $stmt->fetchColumn();

    return $entradas - $salidas;
}

function generarCodigoQR($texto) {
    $url = urlencode($texto);
    return "https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=$url&choe=UTF-8";
}
?>
