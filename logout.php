<?php
session_start();
session_destroy();
echo "Sessão Terminada com sucesso";
header("Location: login.php");
exit();
?>
