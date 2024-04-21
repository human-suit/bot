<?php
	$name_file = $_FILES['file']['name'];
	$size_file = $_FILES['file']['size'];
	$data = [
		"ful_dir" => $name_file,
		"id" => $_COOKIE['user']
	];
	setcookie('src', $data['ful_dir'], time() + 3600, "/");
	if(isset($_FILES['file'])){
		if(move_uploaded_file($_FILES['file']['tmp_name'], 'E:/open/OSPanel/domains/strim/donloads/musics/' . $_FILES['file']['name'])){
			if($size_file > 2 * 1024 * 1024 * 1024 * 1024 * 1024 * 1024){
				echo 'Cлишком большой';
				exit();
			}else{
				echo 'Создано';
			}
		}else{
			echo 'Нету файла';
		}
	}
	else{
		echo 'Файл не найден';
		exit();
	}
		

?>