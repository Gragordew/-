<?php
session_start();
$userId = $_SESSION['id']; // Получаем ID пользователя из сессии
$userFile = $_FILES['userfile']; // Загруженный файл
$arr = explode(".", $userFile['name']); // Дробим имя загруженного файла по точке, чтобы получить его расширение
$extension = ( $arr[count($arr)-1] ); // Достаём расширение файла
$goodExtensions = ["png", "jpg", "jpeg", "gif"]; // Список допустимых расширений файла
foreach ($goodExtensions as $e){ // перебираем допустимые расширения
    if($e == $extension){ // Сравниваем расширение файла и допустимое расширение
        $dir = "../img/user_avatar/".$userFile['name'];
        $resultDir = "/img/user_avatar/".$userFile['name'];
        move_uploaded_file($userFile['tmp_name'], $dir);
        $mysqli = new mysqli("localhost", "root", "", "php1901");
        $mysqli->query("UPDATE `users` SET `img`='$resultDir' WHERE id='$userId'");
        $_SESSION['img'] = $resultDir;
        header("Location: /profile.php");
        exit();
    }
}
exit("Type file ERROR!");