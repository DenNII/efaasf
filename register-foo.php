<?php
require_once('database.php');

// Получение данных из POST запроса
$email = $_POST['email'] ?? '';
$login = $_POST['login'] ?? '';
$password = $_POST['password'] ?? '';

// Проверить, заполнены ли все поля
if (empty($email) || empty($login) || empty($password)) {
    die('Необходимо заполнить все поля');
}

// Проверка корректности логина
if (!preg_match('/\d/', $login) || strlen($login) < 6) {
    die('Логин должен содержать хотя бы одну цифру и быть не короче 6 символов');
}

// Проверка уникальности логина
$query = $connection->prepare("SELECT * FROM users WHERE login = ?");
$query->bind_param("s", $login);
$query->execute();
$result = $query->get_result();
if ($result->num_rows > 0) {
    die('Пользователь с таким логином уже существует');
}

// Проверка корректности пароля
if (!preg_match('/[a-z]/', $password) || !preg_match('/[A-Z]/', $password) || !preg_match('/\d/', $password) || strlen($password) < 6) {
    die('Пароль должен содержать хотя бы одну маленькую и одну заглавную букву, цифру и быть не короче 6 символов');
}

// Проверка корректности email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die('Некорректный формат email');
}

// Проверка уникальности email
$query = $connection->prepare("SELECT * FROM users WHERE email = ?");
$query->bind_param("s", $email);
$query->execute();
$result = $query->get_result();
if ($result->num_rows > 0) {
    die('Пользователь с таким email уже существует');
}

// Запись нового пользователя в базу данных
$query = $connection->prepare("INSERT INTO users (email, login, password) VALUES (?, ?, ?)");
$query->bind_param("sss", $email, $login, $password);
if ($query->execute()) {
    // Успешная регистрация
    header('Location: index.php');
    exit();
} else {
    die('Ошибка при регистрации');
}
?>