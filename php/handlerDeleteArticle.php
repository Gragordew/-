<?php
$mysqli = new mysqli("localhost", "root", "", "php1901");
$id = $_GET['id'];
$mysqli->query("DELETE FROM `articles` WHERE id='$id'");
header("Location: /articles.php");