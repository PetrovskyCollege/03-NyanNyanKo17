<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
session_start();

if (isset($_SESSION['user_id'])) {
    require_once '../assets/php/database.php';  // Подключите файл с классом для работы с базой данных

    $db = new Database();
    $user_id = $_SESSION['user_id'];

    
    $user = $db->getUserById($user_id);

    if ($user) {
        $username = $user['login'];
        echo "Привет, $username!";
    } else {
        echo "Ошибка: Не удалось получить информацию о пользователе.";
    }
} else {
    echo "Вы не авторизованы.";
}
?>
</body>
</html>
