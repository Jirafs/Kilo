<?php
session_start();
if (!isset($_SESSION['user'])) {
  header('Location: login.html');
  exit;
}
echo "Добро пожаловать, " . htmlspecialchars($_SESSION['user']['name']) . "!<br>";
echo '<a href="auth/logout.php">Выйти</a>';
?>
