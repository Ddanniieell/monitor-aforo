<?php
require_once "../includes/db.php";
require_once "../includes/functions.php";

$aforoActual = contarAforoActual($pdo);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Evento Monitor de Aforo</title>
    <link rel="stylesheet" href="assets/css/styles.css" />
</head>
<body>
    <h1>Bienvenido al Evento</h1>
    <p>Aforo actual: <strong><?=$aforoActual?></strong></p>
    <p>Por favor accede con tu código QR o registra tu entrada/salida aquí:</p>
    <p><a href="acceso.php">Registrar Acceso</a></p>
</body>
</html>
