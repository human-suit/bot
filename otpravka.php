<?php
	$data = [
	"name" => filter_var(trim($_POST['name_reg']),
	FILTER_SANITIZE_STRING),
	"email" => filter_var(trim($_POST['email_reg']),
	FILTER_SANITIZE_STRING),
	"passwor" => filter_var($_POST['password_reg'],
	FILTER_SANITIZE_STRING),
	"avatar" => '1.jpg',
	"ball" => 0,
	"fon" => 'fon.jpg'
	];

	$passwor = md5($passwor."qweqrwas432");

	$connection = new PDO('mysql:host=localhost;dbname=bd_strim', 'root', '');
	$sql = 'INSERT INTO account (email,password,name,avatar,fon,ball) VALUES (:email, :passwor, :name,:avatar,:fon, :ball)';
	$statement = $connection->prepare($sql);
	$result = $statement->execute($data);
	$name = $data["name"];
	setcookie('user', $data["email"], time() + 3600, "/");
?>