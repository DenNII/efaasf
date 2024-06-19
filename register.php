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
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <header style="color: white"></header>
    <form action="register-foo.php" method="post">
        <p>Есть аккаунт? <a href="register.php">Авторизируйся!</a></p>
        <div class="form-field">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-field">
            <label for="login">Логин:</label>
            <input type="text" id="login" name="login" required>
        </div>
        <div class="form-field">
            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Зарегистрироваться</button>
    </form>

    <footer style="color: white"></footer>
    <script src="search.php"></script>
</body>

</html>