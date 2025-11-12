<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Conexão com a base de dados
include('config.php');

$username = $_SESSION['username'];
$query = "SELECT * FROM utilizadores WHERE username='$username'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Perfil do Utilizador</title>
</head>
<body>
    <h1>Bem-vindo, <?php echo $user['username']; ?>!</h1>
    <p>Data de Registo: <?php echo $user['created_at']; ?></p>
    <a href="logout.php">Logout</a>
</body>
</html>
