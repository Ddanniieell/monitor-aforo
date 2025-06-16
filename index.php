<?php
session_start();
require_once "../includes/db.php";

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'] ?? '';
    $pass = $_POST['password'] ?? '';

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE username = :user");
    $stmt->execute(['user' => $user]);
    $usuario = $stmt->fetch();

    if ($usuario && password_verify($pass, $usuario['password'])) {
        $_SESSION['user'] = $usuario['username'];
        $_SESSION['role'] = $usuario['role'];
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Login Monitor de Aforo</title>
    <link rel="stylesheet" href="assets/css/styles.css" />
</head>
<body>
    <div class="login-container">
        <h1>Monitor de Aforo - Login</h1>
        <?php if ($error): ?>
            <p class="error"><?=htmlspecialchars($error)?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <label>Usuario:</label>
            <input type="text" name="username" required />
            <label>Contraseña:</label>
            <input type="password" name="password" required />
            <button type="submit">Ingresar</button>
        </form>
    </div>
</body>
</html>
