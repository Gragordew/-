<?php
$path  = explode("/", $_SERVER['REQUEST_URI']);
$method = $_SERVER['REQUEST_METHOD'];
$mysqli = new mysqli("localhost", "root", "", "php1901");
require_once('php/classes/ArticleController.php');
if ($path[1] == "login"){
    $content =  file_get_contents("view/login.html");
}elseif ($path[1] == "reg"){
    $content =  file_get_contents("view/reg.html");
}elseif ($path[1] == "profile" && $method == 'POST'){
    exit(UserController::profile());
}elseif ($path[1] == "articles"){
    $content =  file_get_contents("view/articles.html");
}elseif ($path[1] == "article" && $method == "GET"){
    $content = file_get_contents("view/article.html");
}elseif ($path[1] == "addArticle" && $method == "GET"){
    $content = file_get_contents("view/addArticle.html");
}elseif ($path[1] == "getArticles"){
    exit(ArticleController::getArticles());
}elseif ($path[1] == "article" && $method == 'POST'){
    exit(ArticleController::getArticleById());
}elseif ($path[1] == "addArticle" && $method == 'POST'){
    ArticleController::addArticle();
}elseif ($path[1] == "deleteArticle"){
    ArticleController::deleteArticle();
}elseif ($path[1] == 'login' && $method == 'POST'){
    UserController::login();
}elseif ($path[1] == 'reg' && $method == 'POST'){
    UserController::reg();
}elseif ($path[1] == 'avatar' && $method == 'POST'){
    UserController::avatar();
}elseif ($path[1] == 'addComment'){
    ArticleController::addComment();
}
else{
    $content = "Страница не найдена 404";
}
require_once('template.php');