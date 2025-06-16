<?php
require_once "../includes/auth.php";
requireLogin();
require_once "../includes/db.php";
require_once "../includes/functions.php";

$aforoActual = contarAforoActual($pdo);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Panel Monitor de Aforo</title>
    <link rel="stylesheet" href="assets/css/styles.css" />
</head>
<body>
    <h1>Panel de Control - Monitor de Aforo</h1>
    <p>Bienvenido, <?=htmlspecialchars($_SESSION['user'])?></p>
    <p>Aforo Actual: <strong><?=$aforoActual?></strong></p>

    <h2>Código QR para acceso</h2>
    <?php
    $urlAcceso = "http://localhost/monitor_aforo/public/acceso.php";
    $qrUrl = generarCodigoQR($urlAcceso);
    ?>
    <img src="<?=$qrUrl?>" alt="QR Acceso" />

    <p><a href="logout.php">Cerrar sesión</a></p>
</body>
</html>
