<?php
// login.php

require_once '../assets/php/database.php';
require_once '../assets/php/user.php';

$db = new Database();
$user = new User($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($user->login($email, $password)) {
        header("Location: user_page.php");
        exit();
    } else {
        echo "Login failed. Please check your email and password.";
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
       
            <form action="login.php" method="post">
                <h2>АВТОРИЗАЦИЯ</h2>
                <input class="login_input" type="email" name="email" placeholder="почта" required>
                <input class="login_input" type="password" name="password" placeholder="пароль" required>
                <input class="button" type="submit" value="Войти">
                <a href="register.php" class="button join">зарегистрироваться</a>
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