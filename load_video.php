<?php
	$data = [
	"url" => $_COOKIE['src'],
	"name" => filter_var(trim($_POST['nazvanie']),
	FILTER_SANITIZE_STRING),
	"opis" => filter_var($_POST['opisanie_text'],
	FILTER_SANITIZE_STRING),
	"date_t" => filter_var(trim($_POST['date']),
	FILTER_SANITIZE_STRING),
	"mesto" => filter_var($_POST['mesto'],
	FILTER_SANITIZE_STRING),
	"kom" => '1',
	"ogran" => 0,
	"report" => 0,
	"kategory" => filter_var($_POST['kategory'],
	FILTER_SANITIZE_STRING),
	"id" => $_COOKIE['user']
	];
	$kat = $data['kategory'];
	if($kat=="Развлечение"){
		rename("donloads/musics".$_COOKIE['src'], "donloads/fun/".$_COOKIE['src']);
	} else if($kat=="Кулинария"){
		rename($_COOKIE['src'], "food/".$_COOKIE['src']);
	} else if($kat=="Юмор"){
		rename($_COOKIE['src'], "umor/".$_COOKIE['src']);
	} else if($kat=="Спорт"){
		rename($_COOKIE['src'], "sport/".$_COOKIE['src']);
	} else if($kat=="Наука и техника"){
		rename($_COOKIE['src'], "science/".$_COOKIE['src']);
	} else if($kat=="Новости и политика"){
		rename($_COOKIE['src'], "news/".$_COOKIE['src']);
	} else if($kat=="Путешествие"){
		rename($_COOKIE['src'], "travel/".$_COOKIE['src']);
	} else{
		
	}
	$connection = new PDO('mysql:host=localhost;dbname=bd_strim', 'root', '');
	$sql = 'INSERT INTO video_host (url_video,name_video,opisanie,date,mesto,kategory,comment,ogran,report,id_ac) VALUES (:url, :name,:opis,:date_t, :mesto,:kategory,:kom,:ogran,:report,:id)';
	$statement = $connection->prepare($sql);
	$result = $statement->execute($data);
?>