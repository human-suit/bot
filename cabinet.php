<?php
	if($_COOKIE['user'] == ''){
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Личный кабинет</title>
	<link rel="stylesheet" href="css/index_cabinet4.css" id="theme">
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

	$results = mysqli_query($mysql, "SELECT * FROM `video_host`");
	$resulta = mysqli_query($mysql, "SELECT * FROM `recomens`");
	$resultss = mysqli_query($mysql, "SELECT * FROM `video_host` ORDER BY `id` DESC" );

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
	<link rel="stylesheet" href="css/index_cabinet4.css" id="theme">

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<title>Личный кабинет</title>
</head>
<body>
	<div class="wrap">
	<a href=""></a>
	<header id="back" class="center">
		<div class="container">
			<div class="header">
				<a class="logo" href="index.php">Glock</a>
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
			<div class="zad">
			</div>
			<div id="up">
   					<a href="#popup_nastroiki" class="fas fa-pen"></a>
   					<p class="pod">Настроить</p>
   			</div>
   			<div id="opisanie">
   				<div class="box">
   					<h3>Описание</h3>
   					<p class="one">1.Игры</p>
   					<p>2.Фильмы</p>
   					<p>3.Разговоры</p>
   				</div>
   			</div>
   			<div id="new" class="sguer">
   					
   			</div>
   			<div id="new2" class="sguer">
   					
   			</div>
		</div>
	</section>
	<section id="video_library">
		<div class="container">
			<div class="video_history">
				<div class="video_stroka">
					<div class="slider2">
							<?php $hum=0;$i=0; while ($i<8) {
								
							 $hum++;$i++;?>
							<div class="slider_item">
								<button id="<?php echo $hum;?>" class="perehod">0</button>
								<div class="katalog">
										
								</div>
							</div>
							<?php }?>
					</div>
				</div>
				<!-- <div class="slider3">
					<p>Музыка</p>
					<p>Развлечение</p>
					<p>Кулинария</p>
					<p>Юмор</p>
					<p>Спорт</p>
					<p>Наука и техника</p>
					<p>Новости и политика</p>
					<p>Путешествие</p>
				</div> -->
			</div>
		</div>
	</section>
	<section id="video_host">
		<div class="container">
		<div class="video_history">
   		<?php $hum=0; while ($videos = mysqli_fetch_assoc($resultss)) {
			$hum++;
			 if($videos['id_ac'] == $_COOKIE['user']){?>
				<video width="300" height="200" controls="controls" id="vid<?php echo $hum;?>" class="video_media" src="donloads/musics/<?php echo $videos['url_video'];?>" ></video>
				<?php }	
			}?>
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
					<a id="min3" href="#back" class="vxod2">Канал</a>
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
					<div>
							<img class="nast_img" src="donloads/avatars/<?php echo $avatar; ?>" height="100px;" width="110x">
							<img src="" alt="">
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
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<script src="https://kit.fontawesome.com/09e82d9ae2.js" crossorigin="anonymous"></script>

	<script src="js/exit.js"></script>
</body>
</html>
<?php
exit();
}
?>