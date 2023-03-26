<?php
class ArticleController{
    public static function getArticles(){
        global $mysqli;
        $result = $mysqli->query("SELECT * FROM articles");
        $articles = [];
        while (($row = $result->fetch_assoc()) != null){
            $articles[] = $row;
        }
        return json_encode($articles);
    }
    public static function getArticleById(){
        global $mysqli;
        $articleId = $_POST['article_id'];
        $result = $mysqli->query("SELECT * FROM articles WHERE id='$articleId'");
        $row = $result->fetch_assoc();
        return json_encode($row);
    }
    public static function addArticle(){
        global $mysqli;
        $title = $_POST['title'];
        $content = $_POST['content'];
        $author = $_POST['author'];
        $mysqli->query("INSERT INTO `articles`(`title`, `content`, `author`) VALUES ('$title','$content','$author')");
        header("Location: /articles");
    }
    public static function deleteArticle(){
        global $mysqli;
        $id = $_GET['id'];
        $mysqli->query("DELETE FROM `articles` WHERE id='$id'");
        header("Location: /articles");
    }
    public static function addComment(){
        global $mysqli;
        $userId = $_POST['user_id'];
        $articleId = $_POST['article_id'];
        $comment = $_POST['comment'];
        $mysqli->query("INSERT INTO `comments`(`user_id`, `article_id`, `comment`) VALUES ('$userId', '$articleId', '$comment')");
        header("Location: /article/$articleId");
    }
}