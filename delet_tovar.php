<?php
	$data = [
        "per" => $_POST['per'],
        "id_ac" => $_COOKIE['user']
        ];
        $id = $data['per'];
        $id_ac = $data['id_ac'];
	$connection = new PDO('mysql:host=localhost;dbname=bd_strim', 'root', '');
	$sql = "DELETE FROM `magazine` WHERE `id` = '$id' and `id_accounta` = '$id_ac';";
	$statement = $connection->prepare($sql);
	$result = $statement->execute($data);
?>