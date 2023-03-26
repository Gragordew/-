<?php
	session_start();
		$img=$_SESSION['img'];
		$name=$_SESSION['name'];
		$email=$_SESSION['email'];
		$id=$_SESSION['id'];
		$result=[$img, $name, $email, $id];
		echo json_encode ($result);
		