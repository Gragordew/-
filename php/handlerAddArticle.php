<?php
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_POST['author'];
    $mysqli = new mysqli("localhost", "root", "", "php1901");
    $mysqli->query("INSERT INTO `articles`(`title`, `content`, `author`) VALUES ('$title','$content','$author')");
    echo "Статья успешно добавлена!";
