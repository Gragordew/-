<?php
$mysqli = new mysqli("localhost", "root", "", "php1901");
$articleId = $_POST['article_id'];
$result = $mysqli->query("SELECT * FROM articles WHERE id='$articleId'");
$row = $result->fetch_assoc();
echo json_encode($row);