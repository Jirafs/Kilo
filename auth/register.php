<?php
require 'db.php';

// Получаем данные из формы
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$password = $_POST['password'];

// Проверяем длину пароля
// if (strlen($password) < 6) {
//     die("Пароль должен быть не менее 6 символов.");
// }

// Хешируем пароль
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

// Проверяем, существует ли такой email в базе данных
$stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
$stmt->execute([$email]);
if ($stmt->fetch()) {
    die("Этот email уже зарегистрирован.");
}

// Добавляем нового пользователя в базу данных
$stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
$stmt->execute([$name, $email, $passwordHash]);

header('Location: ../login.html');
?>
