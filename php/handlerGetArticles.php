<?php
    $mysqli = new mysqli("localhost", "root", "", "php1901");
    $result = $mysqli->query("SELECT * FROM articles");
    $articles = [];
    while (($row = $result->fetch_assoc()) != null){
        $articles[] = $row;
    }
    echo json_encode($articles);