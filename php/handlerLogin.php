<?php
    session_start();
    $email = $_POST['email']; // admin@mail.ru
    $pass = $_POST['pass']; // 456
    //echo "$email $pass";
    $mysqli = new mysqli("localhost", "root", "", "php1901");
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email' AND pass='$pass'");
    $row = $result->fetch_assoc(); // Получаем ответ от БД в виде ассоциативного массива
    if($result->num_rows){
        $_SESSION['name'] = $row['name'];
        $_SESSION['lastname'] = $row['lastname'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['img'] = $row['img'];
        header("Location: /profile.php");
    }else{
        echo "Неправильный логин или пароль <a href='/login.php'>Попробовать ещё раз</a>";
    }
