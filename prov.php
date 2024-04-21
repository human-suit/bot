<?php
	$data = [
	"email" => filter_var(trim($_POST['email_vxod']),
	FILTER_SANITIZE_STRING),
	"passwor" => filter_var($_POST['password_vxod'],
	FILTER_SANITIZE_STRING),
	];

	$email = $data["email"];
	$passwor = $data["passwor"];

	$mysql = new mysqli('localhost','root','','bd_strim');
	
	$result = $mysql->query("SELECT * FROM `account`;");
	while ($ac = mysqli_fetch_assoc($result)) {
		if($data["email"] == $ac['email'] && $data["passwor"] == $ac['password']){
			$id = $data["email"];
			setcookie("user", $id, time() + 3600, "/");
			exit();
		}
	}
	echo "Пользователя не существует!";
	exit();
	
?>