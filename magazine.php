<?php
	if($_COOKIE['user'] == ''){
?>
<!DOCTYPE php>
<php lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Личный магазин</title>
	<link rel="stylesheet" href="css/index_cabinet2.css" id="theme">
</head>
<body>
	<div class="center0">
			Ошибка 0004!
	</div>
</body>
</php>
<?php
exit();
}
	else{

	$mysql = new mysqli('localhost','root','','bd_strim');
	
	$resulta = mysqli_query($mysql, "SELECT * FROM `account`");

	while ($login_s = mysqli_fetch_assoc($resulta)) {
		if($_COOKIE['user'] == $login_s['email']){
			$User_id=$login_s['email'];
			$name_ac=$login_s['name'];
			$avatar = $login_s['avatar'];
		}
	}
	$resulta2 = mysqli_query($mysql, "SELECT * FROM `magazine`");

	while($name = mysqli_fetch_assoc($resulta2)){
		if($_COOKIE['user'] == $name['id_accounta']){
				$kol = $name['kol'];
		}
	}
	$results = mysqli_query($mysql, "SELECT * FROM `video_host`");

?>
<!DOCTYPE php>
<php lang="en">
<head>
	<link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Press+Start+2P">
  <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono">
	<meta charset="UTF-8">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/index_magazin5.css" id="theme">

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<title>Личный магазин</title>
</head>
<body>
	<header id="back" class="center">
		<div class="container">
			<div class="header">
				<a class="logo" href="#">Glock</a>
				<a class="prosm">Подписки</a>
				<a href="index.php"  class="prosm">Просмотр</a>
				<a class="prosm">Faq</a>
				<div>
					<button id="dark"></button>
				</div>
				<div class="top">
				<div class="menu">
					<a id="vxod" href="#" class="vxod3"> 
				</div>
				<div>
					<button id="yved" class="fas fa-bullhorn"></button>
				</div>
				<div>
					<a href="#popup" id="tul" class="fas fa-align-justify"></a>
				</div>
				</div>
			</div>
		</div>
	</header>
	<section id="back_lk" class="back_lk">
		<div class="container">
			<div class="profil_fon">
				<div class="pokup">
					<a href="#popup_magazin"><img src="../img/icon_mg.png" alt="" height="100px"></a>
					<p class="colored">Создать услуги</p>
				</div>
				<div class="img_prof">
						<img src="donloads/avatars/<?php echo $avatar; ?>" height="100px;" width="110x">
					</div>
					<table>
						<td class="block_1">
   						</td>
   						<td class="block_2"></td>
  						<td class="block_3"></td>
   						<td class="block_4"></td>
				</table>
				<div class="pusto">
	
   				</div>
   				<div class="name_account">
   					<h1> <?php  echo($name_ac);?> </h1>
   				</div>
   				<div class="sguer">
   					
   				</div>
   				<div class="sguer" id="niz">
   					
   				</div>
			
		</div>
	</section>
	<section id="bloc_library">
		<div class="container">
			<div class="box_line">
				<div class="box_slav">
					<?php
						$resulta2 = mysqli_query($mysql, "SELECT * FROM `magazine`");

						while($name = mysqli_fetch_assoc($resulta2)){
							if($_COOKIE['user'] == $name['id_accounta']){ ?>
								<div class="fle">
									<a href="#">
										<img src="<?php  $url = $name['img']; echo $url;   ?>" height="200px" width="300px" alt="">
									</a>
									<div class="text_tov">
										<h2><?php  $name_tovar = $name['name_tovar']; echo $name_tovar;   ?></h2>
										<p><?php  $opisanie_tovar = $name['opisanie_tovar']; echo $opisanie_tovar;   ?></p>
									</div>
									<div class="chena">
										<p><?php  $sum = $name['sum']; echo $sum;  ?> Руб</p>
										<a href="#">Заказать</a>
									</div>
									<div><a id="<?php  $resulta4 = mysqli_query($mysql, "SELECT * FROM `magazine`");
										while($vod = mysqli_fetch_assoc($resulta4)){
											if($_COOKIE['user'] == $vod['id_accounta'] && $vod['img'] == $url){
												$id = $vod['id'];
												echo $vod['id'];
											}
										}?>" onClick="getId(event)" href="#popup_redact" class="redact">Редактировать</a></div>
										<div>
										<a id="<?php  $resulta5 = mysqli_query($mysql, "SELECT * FROM `magazine`");
										while($vod2 = mysqli_fetch_assoc($resulta5)){
											if($_COOKIE['user'] == $vod2['id_accounta'] && $vod2['img'] == $url){
												$id = $vod2['id'];
												echo $vod2['id'];
											}
										}?>" onClick="getId(event)" href="#popup_del" class="delet">Удалить</a></div>
								</div>
								<?php
							}
						}
					?>
				</div>
			</div>
		</div>
	</section>
	<section id='bloc_library_t'>
		<div class="container">
			
		</div>
	</section>
	
	

	<div id="popup" class="popup fonts_robot">
		<a href="#back" class="popup_area"></a>
		<div class="popup_doby">
			<div class="popup_content">
				<div class="title_pop">
					<a href="#back">Главная</a>
				</div>
				<div class="vx">
					<a id="min6" href="#" class="vxod2">Стрим</a>
				</div>
				<div class="vx">
					<a id="min5" href="studio_video.php" class="vxod2">Видео</a>
				</div>
				<div class="vx">
					<a id="min4" href="magazine.php" class="vxod2">Магазин</a>
				</div>
				<div class="vx">
					<a id="min3" href="cabinet.php" class="vxod2">Канал</a>
				</div>
				<div class="vx">
					<a id="min2" href="#" class="vxod2">Настройки</a>
				</div>
				<div class="vx">
					<a id="min" href="#" class="vxod2">Статистика</a>
				</div>
					<button id="exit_bu" class="vxod2">Выйти</button>
			</div>
		</div>
	</div>

	<div id="popup_nastroiki" class="popup_nastroiki fonts_robot">
		<a href="#back" class="popup_area_register"></a>
		<div class="popup_doby_nast">
			<div class="popup_content_nast">
					<div class="title_nast">
						<h2>Выберите что настроить!</h2>
					</div>
					<div class="box">
							<img src="donloads/avatars/<?php echo $avatar; ?>" height="100px;" width="110x">
					</div>
			</div>
		</div>
	</div>


	<div id="popup_magazin" class="popup_magazin fonts_robot">
		<a href="#back" class="popup_area_magz"></a>
		<div class="popup_doby_magz">
			<div class="popup_content_magaz">
					<div class="title_magz">
						<h2>Выберите что хотите выложить!</h2>
					</div>
					<div class="box_magaz">
						<div class="s">
							<a href="#popup_usl"><img src="../img/usl.png" height="100px" widht="100px" alt="Фото"></a>
							<p>Услуги</p>
						</div>
						<div class="s">
							<a href="#"><img src="../img/tovar.png" height="100px" widht="100px" alt="Фото"></a>
							<p>Товары</p>
						</div>
					</div>
			</div>
		</div>
	</div>

	<div id="popup_usl" class="popup_usl fonts_robot">
		<a href="#back" class="popup_area_usl"></a>
		<div class="popup_doby_usl">
			<div class="popup_content_usl">
				<div class="title_usl">
					<h2>Перенесите файл с пк на поле</h2>
					<p>После чего вы сможете отредактировать услугу</p>
					<p>на странице</p>
				</div>
				<div class="box_file">
					<input id="file" class="file" name="file" type="file" accept=".jpg, .jpeg, .png">
				</div>
				<div>
					<button id="button_create" class="button_create">Создать</button>
				</div>
			</div>
		</div>
	</div>
	<div id="popup_redact" class="popup_redact fonts_robot">
		<a href="#back" class="popup_area_redact"></a>
		<div class="popup_doby_redact">
			<div class="popup_content_redact">
				<div class="title_redact">
					<h2>Отредактируйте поля</h2>
					<h3>Название</h3>
				</div>
				<div class="flex">
					<div class="box_redact">
						<input id="title_t" class="title_t" name="title_t" type="text" minlength="1" maxlength="300" size="10"  placeholder="Название услуги">
						<p>Описание</p>
						<textarea id="opisani" class="opisani" cols="30" rows="7"></textarea>
						<p>Сумма на покупку</p>
						<input id="sum" class="sum" name="sum" type="number"  min="1" max="999999999" placeholder="Сумма">
					</div>
				</div>
				<div>
					<button id="button_redact" class="button_redact">Сохранить</button>
				</div>
			</div>
		</div>
	</div>
	<div id="popup_del" class="popup_del fonts_robot">
		<a href="#back" class="popup_area_del"></a>
		<div class="popup_doby_del">
			<div class="popup_content_del">
				<div class="title_del">
					<a class="deli" href="#back">x</a>
					<h2>Вы точно хотите удалить?</h2>
				</div>
				<div>
					<button id="button_del" class="button_del">Да</button>
				</div>
			</div>
		</div>
	</div>



	<div id="error" class="error">
		<h1>Заполните все поля!</h1>
	</div>
	<div id="error002" class="error">
		<h1>Взлом системы!</h1>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<script src="https://kit.fontawesome.com/09e82d9ae2.js" crossorigin="anonymous"></script>

	<script src="js/create.js"></script>
</body>
</php>
<?php
exit();
}
?>