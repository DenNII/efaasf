<?php
require_once('database.php');
$users = $connection->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" type="text/css" href="./style.css">
</head>

<body>
    <header style="color: red"></header>
    <form action="login.php" method="post">
        <p>Нет аккаунта? <a href="register.php">Зарегистрируйся!</a></p>
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Пароль">
        <input type="submit" value="Войти">
    </form>

    <footer style="color: red"></footer>
    <script src="search.php"></script>
</body>

</html>