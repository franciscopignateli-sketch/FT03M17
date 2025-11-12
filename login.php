<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashed_password = hash('sha256', $password);

    $sql = "SELECT * FROM utilizadores WHERE username='$username' AND password='$hashed_password'";
    $result = $conn->query($sql);
    $user = mysqli_fetch_assoc($result);
    if ($result->num_rows > 0) {
        echo "Login bem-sucedido!";
        $_SESSION['username'] = $user['username'];
        header("Location: profile.php");
        exit();

        
    } else {
        echo "Username ou password incorretos.";
    }
}
?>
<form method="post" action="">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" value="Login">
</form>
