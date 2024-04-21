<?php

	$name_file = $_FILES['file']['name'];
	$size_file = $_FILES['file']['size'];
	if(isset($_FILES['file'])){
		if(move_uploaded_file($_FILES['file']['tmp_name'], 'E:/open/OSPanel/domains/strim/donloads/img_yslugi/' . $_FILES['file']['name'])){
			if($size_file > 2 * 1024 * 1024){
				echo 'File слишком большой >2 мегабайта';
				exit();
			}else{
				echo 'Создано: Загрузка завершена';
			}
		}else{
			echo 'Нету файла';
		}
	}
	else{
		echo 'Файл не найден';
		exit();
	}
	$data = [
		"title_t" => 'Ваше название...',
		"opisani" => 'Ваше описание...',
		"sum" => 2000,
		"id_ac" => $_COOKIE['user'],
		"ful_dir" => 'donloads/img_yslugi/' . $name_file

		];
	$connection = new PDO('mysql:host=localhost;dbname=bd_strim', 'root', '');
	$sql = 'INSERT INTO magazine (img,name_tovar,opisanie_tovar ,sum,id_accounta) VALUES (:ful_dir, :title_t, :opisani,:sum, :id_ac)';
	$statement = $connection->prepare($sql);
	$result = $statement->execute($data);
?>