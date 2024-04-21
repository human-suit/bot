<?php
	$data = [
        "per" => $_POST['per']
    ];
    $obrab = $data['per'];
    if($obrab == "v1"){
        $obrab = 'Музыка';
    } else if($obrab == "v2"){
        $obrab = 'Развлечение';
    } else if($obrab == "v3"){
        $obrab = 'Кулинария';
    } else if($obrab == "v4"){
        $obrab = 'Юмор';
    } else if($obrab == "v5"){
        $obrab = 'Спорт';
    } else if($obrab == "v6"){
        $obrab = 'Наука и техника';
    } else if($obrab == "v7"){
        $obrab = 'Новости и политика';
    } else if($obrab == "v8"){
        $obrab = 'Путешествие';
    } else{
        $obrab = 'Ошибка!';
    }
    setcookie('kategory', $obrab, time() + 3600, "/");

?>