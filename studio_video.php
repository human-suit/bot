<?php
	if($_COOKIE['user'] == ''){
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Выпуск видео</title>
	<link rel="stylesheet" href="css/index_video.css" id="theme">
</head>
<body>
	<div class="center0">
			Ошибка 0004!
	</div>
</body>
</html>
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

	$results = mysqli_query($mysql, "SELECT * FROM `video_host` ORDER BY `id` DESC" );

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Press+Start+2P">
  <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono">
	<meta charset="UTF-8">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/index_video4.css" id="theme">

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<title>Выпуск видео</title>
</head>
<body>
	<a href=""></a>
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
				<div class="img_prof">
						<img src="donloads/avatars/<?php echo $avatar; ?>" height="30px;" width="30x">
					</div>
   				<div class="name_account">
   					<h1> <?php  echo($name_ac);?> </h1>
   				</div>
   				
			</div>
			<div class="zad">
			</div>
			
			<div id="up">
   					<a href="#popup_usl" class="fas fa-angle-double-down"></a>
   					<p class="pod">Загрузить видео</p>
   			</div>
			<div id="le">
				<form action="word.php" method="POST" enctype="multipart/form-data">
					<button type="submit" id="otchet">Клик</button>
				</form>
				<p class="pad">Сформировать отчет</p>	
   			</div>
			   
   			<div id="new" class="sguer"></div>
   			
   			<div class="palka3"></div>
   				<div class="video_history">
   					<?php $hum=0; while ($videos = mysqli_fetch_assoc($results)) {
							 $hum++;
							 if($videos['id_ac']==$_COOKIE['user']){?>
								<a href="#" id="delet<?php echo $hum;?>" class="delet">x</a>
								<video width="300" height="200" controls="controls" id="vid<?php echo $hum;?>" class="video_media" src="donloads/musics/<?php echo $videos['url_video'];?>" ></video>
								<?php }
							 }
							 
							 ?>
							</div>
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
	</div>

	<div id="popup_usl" class="popup_usl fonts_robot">
		<a href="#back" class="popup_area_usl"></a>
		<div class="popup_doby_usl">
			<div class="popup_content_usl">
				<div class="title_usl">
					<h2>Перенесите видео с пк на поле</h2>
					<p>После чего вы сможете отредактировать видео</p>
					<p>на странице</p>
				</div>
				<div class="box_file">
					<input id="file" class="file" name="file" type="file" accept=".jpg, .jpeg, .png">
				</div>
				<div>
					<a href="#popup_nastroiki" id="button_create" class="button_create">Загрузить</a>
				</div>
			</div>
		</div>
	</div>


	<div id="popup_nastroiki" class="popup_nastroiki fonts_robot">
		<a href="#back" class="popup_area_register"></a>
		<div class="popup_doby_nast">
			<div class="popup_content_nast">

				<div class="slider">
							<div class="slider_item">
								<div class="title_nast">
						<h3>Название и описание</h3>
						<div class="p">
						<input id="nazvanie" class="nazvanie" name="nazvanie" type="text">
						<textarea id="opisanie_text" class="opisanie_text" name="opisanie_text"></textarea>
						</div>
					</div>
							</div>
							<div class="slider_item">
								<div class="zast">
						
					</div>
					<div class="data_box">
						<h2>Дата и место</h2>
						<input id="date" type="date" class="date">
						<input id="mesto" type="text" class="mesto">
					</div>
					<div class="com">
						<h2>Комментарии</h2>	
							<input type="radio" name="drink" value="rad1">Запретить<Br>
   						<input type="radio" name="drink" value="rad2"> Разрешить<Br>
					</div>
					<h2 class="categ">Категория</h2>
					<select id="kategory" class="select" атрибуты>
  							<option value="Музыка">Музыка</option>
  							<option value="Развлечение">Развлечение</option>
  							<option value="Кулинария">Кулинария</option>
  							<option value="Юмор">Юмор</option> 
  							<option value="Спорт">Спорт</option>
  							<option value="Наука и техника">Наука и техника</option>
  							<option value="Новости и политика">Новости и политика</option>
  							<option value="Путешествие">Путешествие</option>  
							</select>
					</div>
					</div>

					<div>
						<button id="load_video" class="otprav">Загрузить</button>
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

	<script src="js/exit.js"></script>

	<script src="js/create_vd.js"></script>
</body>
</html>
<?php
exit();
}
?>