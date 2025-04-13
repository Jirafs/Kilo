<?php
require 'db.php';
session_start();
$email = trim($_POST['email']);
$password = $_POST['password'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch();
if ($user && password_verify($password, $user['password'])) {
  $_SESSION['user'] = $user;
  header('Location: ../welcome.php');
} else {
  echo "Неверные данные.";
}
?>
