<?php
require 'db.php';
session_start();

// Получаем данные из формы
$email = trim($_POST['email']);
$password = $_POST['password'];

// Проверяем длину пароля
// if (strlen($password) < 6) {
//     die("Пароль должен быть не менее 6 символов.");
// }

// Проверяем пользователя в базе данных
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
