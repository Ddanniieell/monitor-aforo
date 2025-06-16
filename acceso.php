<?php
require_once "../includes/db.php";

// Aquí simulamos el acceso con registro en tabla accesos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipo = $_POST['tipo'] ?? 'entrada';
    $hora = date("Y-m-d H:i:s");

    $stmt = $pdo->prepare("INSERT INTO accesos (tipo, fecha_hora) VALUES (:tipo, :fecha_hora)");
    $stmt->execute(['tipo' => $tipo, 'fecha_hora' => $hora]);

    $mensaje = "Acceso registrado: " . htmlspecialchars($tipo);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Acceso al Evento</title>
    <link rel="stylesheet" href="assets/css/styles.css" />
</head>
<body>
    <h1>Acceso al Evento</h1>
    <?php if (isset($mensaje)): ?>
        <p><?=$mensaje?></p>
    <?php endif; ?>
    <form method="POST">
        <label>Tipo de acceso:</label><br/>
        <select name="tipo">
            <option value="entrada">Entrada</option>
            <option value="salida">Salida</option>
        </select><br/><br/>
        <button type="submit">Registrar</button>
    </form>
    <p><a href="evento.php">Volver al Evento</a></p>
</body>
</html>
