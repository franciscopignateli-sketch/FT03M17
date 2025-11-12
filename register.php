<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashed_password = hash('sha256', $password);

    $sql = "INSERT INTO utilizadores (username, password) VALUES ('$username', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registo bem-sucedido!";
        
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}
?>
<form method="post" action="">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" value="Registar">
</form>
