<?php
require_once('database.php');

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($email) || empty($password)) {
    die('Необходимо ввести email и пароль');
}

$query = $connection->prepare("SELECT * FROM users WHERE email = ?");
$query->bind_param("s", $email);
$query->execute();
$result = $query->get_result();

if ($result->num_rows === 0) {
    die('Пользователь с таким email не найден');
}

$user = $result->fetch_assoc();
if ($password !== $user['password']) {
    die('Неверный пароль');
}


$_SESSION['username'] = $user['username'];
echo 'Вы успешно авторизованы!';
header('Location: head.php');

exit();
?>