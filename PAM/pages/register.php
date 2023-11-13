<?php
// register.php

require_once '../assets/php/database.php';
require_once '../assets/php/user.php';

$db = new Database();
$user = new User($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $date_birth = $_POST['date_birth'];
    $password = $_POST['password'];
    $password_rep = $_POST['password_rep'];

    if ($password == $password_rep) {
        if ($user->register($login, $email, $tel, $date_birth, $password)) {
            header("Location: login.php");
            exit();
        } else {
            echo "Registration failed. Please try again. Error: " . $db->getConnection()->error;
        }
    } else {
        echo "Passwords do not match.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/style_login.css">
    <link rel="stylesheet" href="../assets/styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <title>MAP - тренажер Python</title>
</head>


<body>
    <header>
        
        <nav>
            <img src="../assets/img/Remove-bg.ai_1698795091396.png" class="logo" alt="MAP">

            <ul>
                <li><a href="../index.php">ГЛАВНАЯ</a></li>
                <li><a href="">О ПРОЕКТЕ</a></li>
                <li><a href="">КАК ПОЛЬЗОВАТЬСЯ</a></li>
            </ul>
        </nav>
    </header>
    <main>
       
            <form action="register.php" method="post">
                <h2>РЕГИСТРАЦИЯ</h2>
                <input class="login_input" type="text" name="login" placeholder="логин" required>
                <input class="login_input" type="email" name="email" placeholder="почта" required>
                <input class="login_input" type="tel" name="tel" placeholder="номер телефона" required>
                <input class="login_input" type="date" name="date_birth" placeholder="дата рождения" required>
                <input class="login_input" type="password" name="password" placeholder="пароль" required>
                <input class="login_input" type="password" name="password_rep" placeholder="повторите пароль" required>
                <input class="button" type="submit" value="зарегистрироваться">
                <a href="login.php" class="button join">Войти</a>
            </form>
        
    </main>
    <footer>
        <ul>
            <li><a href="../index.php">ГЛАВНАЯ</a></li>
            <li><a href="">О ПРОЕКТЕ</a></li>
            <li><a href="">КАК ПОЛЬЗОВАТЬСЯ</a></li>
        </ul>

        <ul class="social_link">
            <li><a href="../index.php"><img src="../assets/img/Remove-bg.ai_1698795091396.png" class="logo" alt="MAP"></a></li>
            <li><a href="#"><img src="../assets/img/pngwing.com.png" class="social" alt="VK"></a></li>
            <li><a href="#"><img src="../assets/img/github-mark-white 1.svg" class="social" alt="GitHub"></a></li>
        </ul>
    </footer>
</body>

</html>