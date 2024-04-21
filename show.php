<?php
$mysql = new mysqli('localhost','root','','bd_strim');
$resulta = mysqli_query($mysql, "SELECT * FROM `recomens`");
$no=0;
while ($name = mysqli_fetch_assoc($resulta)) {
		$prov ="video/".$name['src'];
		if($_COOKIE['video'] == $prov){
			$name_v=$name['name_v'];
			$opis=$name['opisanie'];
			$likes = $name['likes'];
			$vid = $prov;
			$no=0;
			break;
		}
		else{
			$vid = $_COOKIE['video'];
			$no=1;
		}
	}
if($no==1){
	$resulta = mysqli_query($mysql, "SELECT * FROM `video_host`");
	while ($name = mysqli_fetch_assoc($resulta)) {
		$prov ="donloads/musics/".$name['url_video'];
		if($_COOKIE['video'] == $prov){
			$name_v=$name['name_video'];
			$opis=$name['opisanie'];
			$likes = $name['likes'];
			$vid = $prov;
			$no=0;
			break;
		}
	}
}
if($_COOKIE['user']==''){
	$resulta_history = mysqli_query($mysql, "SELECT * FROM `recomens`");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Press+Start+2P">
  <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/index_show3.css" id="theme">

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<title>Главная</title>
</head>
<body>
	<a href="#"><?php echo $data;?></a>
	<header id="back" class="center">
		<div class="container">
			<div class="header">
				<a class="logo" href="#">Glock</a>
				<a class="prosm">Подписки</a>
				<a href="index.php" class="prosm">Просмотр</a>
				<a class="prosm">Faq</a>
				<div class="poizk">
					<input type="text" placeholder="Поиск" class="searth_text">
					<button id="filter" class="filter">O</button>
				</div>
				<div>
					<button id="dark"></button>
				</div>
				<div class="top">
				<div class="menu">
					<a id="vxod1" href="#popup_vxod" class="vxod">Войти</a>
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
	<section id="video_host">
		<div class="container">
			<div class="show_block">
				<div class="fon">
					<video class="video_media" width="637px" height="358.7px" src="<?php echo $vid;?>" controls ></video>	
					<div class="flex_dis">
					<h1 class="title_video"><?php echo $name_v; ?></h1>
						<div class="like_colom">
							<h5 class="date fonts_robot">Просмотры и Выпуск видео</h5>
							<a href="#" id="like" class="fas fa-heart"></a>
							<h5 class="col"><?php echo $likes; ?></h5>
						<a href="#report_box" id="report" class="fas fa-flag"></a>
						</div>
					</div>
				</div>
				<div class="vid">
					
				</div>
				<h1 class="title_opis">Опи$ание:</h1>
				<div class="opisanie fonts_robot">
					<p>	<?php echo $opis; ?></p>
					</div>
					<div class="fasa"> 
						y
					</div>
					<div id="poza" class="fasa"> 
						x
					</div>
					<div class="fasa2">
						
					</div>
					<div class="fasa3">
						
					</div>
					<div class="slider_2">
							<?php $hum=0; while ($spis = mysqli_fetch_assoc($resulta_history)) {
								
							 $hum++;?>	
							<div class="slider_item">
								<button id="<?php echo $hum;?>" class="perehod"></button>
								<video id="vid<?php echo $hum;?>" class="video_media_b" src="video/<?php echo $spis['src'];?>" ></video>
							</div>
						<?php }?>
						</div>
			</div>
		</div>
	</section>
	

	<div id="report_box" class="report_box fonts_robot">
							<h4>Репорт</h4>
							<input type="radio" name="drink" value="rad1"> 18+	<Br>
   						<input type="radio" name="drink" value="rad2"> Спам<Br>
   						<input type="radio" name="drink" value="rad3"> Другое</p>
   						<a id="report_but" href="#video_host" class="#back">Отправить</a>
   	<div class="fon_rep">
   							
   	</div>
  </div>

	<div id="popup" class="popup fonts_robot">
		<a href="#back" class="popup_area"></a>
		<div class="popup_doby">
			<div class="popup_content">
				<div class="title_pop">
					<a href="#back">Главная</a>
				</div>
				<div class="vx">
					<a href="#popup_vxod" class="vxod2">Войти</a>
				</div>
				<div class="vx">
					<a href="#popup_register" class="vxod">Зарегестрироватся</a>
				</div>
			</div>
		</div>
	</div>

	<div id="popup_vxod" class="popup_vxod fonts_robot">
		<a href="#back" class="popup_area_register"></a>
		<div class="popup_doby_register">
			<div class="popup_content_vxod">
					<h2 class="title_pop_vxod">Войти в <mark>профиль</mark></h2>
					<div class="otp">
						<input id="email_vxod" name="email_vxod" class="email_vxod" type="email" placeholder="Email">
						<input id="password_vxod" name="password_vxod" class="password_vxod" type="password" placeholder="Пароль">
						<button id="vxod_but" class="vxod">Войти</button>
						<div class="palka2"></div>
						<div class="polka2">
							<a href="#" class="fab fa-vk"></a>
							<a href="#" class="fab fa-facebook-square"></a>
							<a href="#" class="fab fa-twitch"></a>
							<a href="#" class="fab fa-google"></a>
							<a href="#" class="fab fa-yandex"></a>
						</div>
						<a id="x" class="account" href="#popup_register">У меня нет учетной записи</a>
						<div class="pusto"></div>
						<a id="y" class="account" href="#popup_vostonov">Восстановить пароль</a>
						<p class="problem2">Проблемы! Пишите на time_and_Work@mail.ru</p>
					</div>
			</div>
		</div>
	</div>

	<div id="popup_vostonov" class="popup_vostonov fonts_robot">
		<a href="#back" class="popup_area_register"></a>
		<div class="popup_doby_vostonov">
			<div class="popup_content_vos">
					<h2 class="title_pop_vos">Восстановление</br> пароля</h2>
					<div class="otp">
						<input type="email" placeholder="Email">
						<button id="vostanov" class="vost">Восстановить</button>
						<a id="no" href="#popup_vxod" class="nazad">Назад</a>
						<p class="problem2">Проблемы! Пишите на time_and_Work@mail.ru</p>
					</div>
			</div>
		</div>
	</div>

	<div id="popup_register" class="popup_register fonts_robot">
		<a href="#back" class="popup_area_register"></a>
		<div class="popup_doby_register">
			<div class="popup_content_register">
					<h2 class="title_pop_register">Регистраиця на <mark>Glock</mark></h2>
					<div class="otp">
										
						<input id="name_reg" class="name_reg" name="name_reg" type="text" placeholder="Имя пользователя" maxlength="20">
						<input id="email_reg" class="email_reg" name="email_reg" type="email" placeholder="Email" maxlength = "101">
						<input id="password_reg" class="password_reg" name="password_reg" type="password" placeholder="Пароль" maxlength="30">
						<div class="checked">
							<div class="flex">
								<input type="checkbox"><p>Я ознакомился и принимаю</br><a href="">пользовательское соглашение</a></p>
							</div>
							<div class="flex">
								<input type="checkbox"><p>Даю <a href="">согласие</a> на
							обработку</br> персональных данных</p>
							</div>
						</div>
						<button id="register" class="register_but" >Зарегестрироватся</button>

						<div class="palka"></div>
						<div class="polka">
							<a href="#" class="fab fa-vk"></a>
							<a href="#" class="fab fa-facebook-square"></a>
							<a href="#" class="fab fa-twitch"></a>
							<a href="#" class="fab fa-google"></a>
							<a href="#" class="fab fa-yandex"></a>
						</div>
						<a class="account" href="#popup_vxod">Уже есть аккаунт</a>
						<p class="problem">Проблемы! Пишите на time_and_Work@mail.ru</p>
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

	<script src="js/slick.min.js"></script>

	<script src="https://kit.fontawesome.com/09e82d9ae2.js" crossorigin="anonymous"></script>

	<script src="js/script.js"></script>
</body>
</html>
<?php } else{ 
	$resulta = mysqli_query($mysql, "SELECT * FROM `recomens`");
while ($name = mysqli_fetch_assoc($resulta)) {
		$prov ="video/".$name['src'];
		if($_COOKIE['video'] == $prov){
			$name_v=$name['name_v'];
			$opis=$name['opisanie'];
			$date = $name['date'];
			$sity = $name['sity'];
			$likes = $name['likes'];
			$vid = $prov;
		}
	}
$resultas = mysqli_query($mysql, "SELECT * FROM `account`");
	while ($login_s = mysqli_fetch_assoc($resultas)) {
		if($_COOKIE['user'] == $login_s['email']){
			$User_id=$login_s['email'];
			$name_ac=$login_s['name'];
			$avatar = $login_s['avatar'];
		}
	}
$resulta_history = mysqli_query($mysql, "SELECT * FROM `recomens`");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Press+Start+2P">
  <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/index_show3.css" id="theme">

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<title>Главная</title>
</head>
<body>
	<a href="#"><?php echo $data;?></a>
	<header id="back" class="center">
		<div class="container">
			<div class="header">
				<a class="logo" href="#">Glock</a>
				<a class="prosm">Подписки</a>
				<a href="index.php" class="prosm">Просмотр</a>
				<a class="prosm">Faq</a>
				<div class="poizk">
					<input type="text" placeholder="Поиск" class="searth_text">
					<button id="filter" class="filter">O</button>
				</div>
				<div>
					<button id="dark"></button>
				</div>
				<div class="top">
				<div class="menu">
					<a id="vxod1" href="cabinet.php" class="vxod"><?php echo $name_ac; ?></a>
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
	<section id="video_host">
		<div class="container">
			<div class="show_block">
				<div class="fon">
					<video class="video_media" width="637px" height="358.7px" src="<?php echo $vid;?>" controls ></video>	
					<div class="flex_dis">
					<h1 class="title_video"><?php echo $name_v; ?></h1>
						<div class="like_colom">
							<h5 class="date fonts_robot">Выпуск видео</h5>
							<h5 class="date fonts_robot"> <?php echo $date; ?> Место - <?php echo $sity; ?></h5>
							<a href="#" id="like" class="fas fa-heart"></a>
							<h5 class="col"><?php echo $likes; ?></h5>
						<a href="#report_box" id="report" class="fas fa-flag"></a>
						</div>
					</div>
				</div>
				<div class="vid">
					
				</div>
				<h1 class="title_opis">Опи$ание:</h1>
				<div class="opisanie fonts_robot">
					<p>	<?php echo $opis; ?></p>
					</div>
					<div class="fasa"> 
						y
					</div>
					<div id="poza" class="fasa"> 
						x
					</div>
					<div class="fasa2">
						
					</div>
					<div class="fasa3">
						
					</div>
					<div class="slider_2">
							<?php $hum=0; while ($spis = mysqli_fetch_assoc($resulta_history)) {
								
							 $hum++;?>	
							<div class="slider_item">
								<button id="<?php echo $hum;?>" class="perehod"></button>
								<video id="vid<?php echo $hum;?>" class="video_media_b" src="video/<?php echo $spis['src'];?>" ></video>
							</div>
						<?php }?>
						</div>
			</div>
		</div>
	</section>
	

	<div id="report_box" class="report_box fonts_robot">
							<h4>Репорт</h4>
							<input type="radio" name="drink" value="rad1"> 18+	<Br>
   						<input type="radio" name="drink" value="rad2"> Спам<Br>
   						<input type="radio" name="drink" value="rad3"> Другое</p>
   						<a id="report_but" href="#video_host" class="#back">Отправить</a>
   	<div class="fon_rep">
   							
   	</div>
  </div>

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
	<div id="error002" class="error">
		<h1>Взлом системы!</h1>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<script src="js/slick.min.js"></script>

	<script src="https://kit.fontawesome.com/09e82d9ae2.js" crossorigin="anonymous"></script>

	<script src="js/script.js"></script>
</body>
</html>

<?php
}
?>