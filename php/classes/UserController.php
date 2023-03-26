<?php
session_start();
class UserController
{
    public static function login()
    {
        global $mysqli;
        global $content;
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $result = $mysqli->query("SELECT * FROM users WHERE email='$email' AND pass='$pass'");
        $row = $result->fetch_assoc();
        if ($result->num_rows) {
            $_SESSION['name'] = $row['name'];
            $_SESSION['lastname'] = $row['lastname'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['img'] = $row['img'];
            header("Location: /profile");
        } else {
            $content = "Неверный логин или пароль";
        }
    }

    public static function reg(){
        global $mysqli;
        global $content;
        $name = $_POST['name'];
        $lastname = $_POST['lastname];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $mysqli = new mysqli("localhost", "root", "", "php1901");
        $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");
        if($result->num_rows){
        echo "Такой пользователь уже существует <a href='/reg.php'>зарегистрировать другого</a>";
        }else{
        $mysqli->query("INSERT INTO `users`(`name`, `lastname`, `email`, `pass`) VALUES ('$name','$lastname','$email','$pass')");
        echo "Пользователь зарегистрирован!";
        header("Location: /login"); 
        }
    }
    public static function profile(){
        $img=$_SESSION['img'];
		$name=$_SESSION['name'];
		$email=$_SESSION['email'];
		$id=$_SESSION['id'];
		$result=[$img, $name, $email, $id];
		return json_encode ($result);
		
    }
    public static function avatar(){
        $userId = $_SESSION['id']; 
        $userFile = $_FILES['userfile']; 
        $arr = explode(".", $userFile['name']); 
        $extension = ( $arr[count($arr)-1] ); 
        $goodExtensions = ["png", "jpg", "jpeg", "gif"]; 
        foreach ($goodExtensions as $e)
            { 
            if($e == $extension);
            }
        $dir = "../img/user_avatar/".$userFile['name'];
        $resultDir = "/img/user_avatar/".$userFile['name'];
        move_uploaded_file($userFile['tmp_name'], $dir);
        $mysqli = new mysqli("localhost", "root", "", "php1901");
        $mysqli->query("UPDATE `users` SET `img`='$resultDir' WHERE id='$userId'");
        $_SESSION['img'] = $resultDir;
        header("Location: /profile");
    }
 }