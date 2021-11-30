<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Задание 2</title>
</head>
<body>
<form action="user.php" method="post">
    <p>ID пользователя: <input type="text" name="id" value="<?=$_POST['id'] ?? ''?>" /></p>
    <p>Ваше имя: <input type="text" name="name" placeholder="Глеб" value="<?=$_POST['name'] ?? ''?>" /></p>
    <p>Ваш возраст: <input type="text" name="age" placeholder="21" value="<?=$_POST['age'] ?? ''?>" /></p>
    <p>Email: <input type="email" name="email" placeholder="email@mail.ru" value="<?=$_POST['email'] ?? ''?>" /></p>
    <p><input type="submit" /></p>
</form>
</body>
</html>

<?php

use Sogener\Crt\TaskSecond\Dbconn;

include '../vendor/autoload.php';

if (!empty($_POST)) {
    $user = new \Sogener\Crt\TaskSecond\User(Dbconn::make());

    if ($user->load($_POST['id'])) {
        echo "Сохранение в бд произошло успешно!";
    }
}
