<?php
$mysql = new mysqli('localhost','root','','bd_strim');
if($_COOKIE['user'] == ""){
$resulta = mysqli_query($mysql, "SELECT * FROM `recomens`");
$resultss = mysqli_query($mysql, "SELECT * FROM `video_host` ORDER BY `id` DESC" );
$resultsss = mysqli_query($mysql, "SELECT * FROM `video_host` ORDER BY `id` DESC" );
$resultssss = mysqli_query($mysql, "SELECT * FROM `video_host` ORDER BY `id` DESC" );

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
	<link rel="stylesheet" href="css/index_list3.css" id="theme">

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<title>Главная</title>
</head>
<body>	
	<div class="wrap">
	<a href=""></a>
	<header id="back" class="center">
		<div class="container">
			<div class="header">
				<a class="logo" href="#">Glock</a>
				<a class="prosm">Подписки</a>
				<a class="prosm" href="index.php">Просмотр</a>
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
	<section id="video_h">
		<div class="container">
			<div class="title_v">
				<h2>
					Музыка
				</h2>
			</div>
		<div class="video_history">
   		<?php $hum=0; while ($videos = mysqli_fetch_assoc($resultss)) {
			$hum++;?>
				<?php if($hum == 5){
				?>	<div class="pus"></div>
				<?php	
				} ?>
				<button onClick = "getdetails(this)" class="<?php echo $hum;?>, perehod2"></button>
				<div class="width">
				<video height="300" controls="controls" id="vad<?php echo $hum;?>" class="video_med" src="donloads/musics/<?php echo $videos['url_video'];?>" ></video>
                </div>
            <?php }?>
		</div>
		</div>
	</section>
	<section id="name_name">
		<div class="container">
			<div class="text_arena">
			<?php $hum=0; while ($videos = mysqli_fetch_assoc($resultsss)) {
			$hum++;?>
			
			<?php
			$resultaa = mysqli_query($mysql, "SELECT * FROM `account`");
			while ($name = mysqli_fetch_assoc($resultaa)){
				if($videos['id_ac']==$name['email']){
					?> <img class="cras" src="../donloads/avatars/<?php echo $name['avatar']; ?>" alt="Фото">
					<a class="pos" href="">  <?php echo $name['name']; ?> </a><?php
				}
				
			}?> 	
			<a href="">  <?php echo $videos['name_video']; ?> </a>
				<div class="opst">
					
                </div>
            <?php }?>
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
	</div>
	
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<script src="js/slick.min.js"></script>

	<script src="https://kit.fontawesome.com/09e82d9ae2.js" crossorigin="anonymous"></script>

	<script src="js/script.js"></script>

	<script src="js/perehod.js"></script>

	<script src="js/perehod2.js"></script>
</body>
</html>
	<?php } else{
		$resulta = mysqli_query($mysql, "SELECT * FROM `recomens`");
		$resultas = mysqli_query($mysql, "SELECT * FROM `account`");
		$resultss = mysqli_query($mysql, "SELECT * FROM `video_host` ORDER BY `id` DESC" );
		$resultsss = mysqli_query($mysql, "SELECT * FROM `video_host` ORDER BY `id` DESC" );
		$resultssss = mysqli_query($mysql, "SELECT * FROM `video_host` ORDER BY `id` DESC" );
	while ($login_s = mysqli_fetch_assoc($resultas)) {
		if($_COOKIE['user'] == $login_s['email']){
			$User_id=$login_s['email'];
			$name_ac=$login_s['name'];
			$avatar = $login_s['avatar'];
		}
	}
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
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<link rel="stylesheet" href="css/index_list3.css" id="theme">
		
			<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		
			<title>Главная</title>
		</head>
		<body>
		<div class="wrap">
			<a href=""></a>
			<header id="back" class="center">
				<div class="container">
					<div class="header">
						<a class="logo" href="#">Glock</a>
						<a class="prosm">Подписки</a>
						<a class="prosm" href="index.php">Просмотр</a>
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
							<a id="vxod1" href="cabinet.php" class="vxod"><?php echo $name_ac;  ?></a>
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
			<section id="video_h">
		<div class="container">
			<div class="title_v">
				<h2>
					Музыка
				</h2>
			</div>
		<div class="video_history">
   		<?php $hum=0; while ($videos = mysqli_fetch_assoc($resultss)) {
			$hum++;?>
				<?php if($hum == 5){
				?>	<div class="pus"></div>
				<?php	
				} ?>
				<button onClick = "getdetails(this)" class="<?php echo $hum;?>, perehod2"></button>
				<div class="width">
				<video height="300" controls="controls" id="vad<?php echo $hum;?>" class="video_med" src="donloads/musics/<?php echo $videos['url_video'];?>" ></video>
                </div>
            <?php }?>
		</div>
		</div>
	</section>
	<section id="name_name">
		<div class="container">
			<div class="text_arena">
			<?php $hum=0; while ($videos = mysqli_fetch_assoc($resultsss)) {
			$hum++;?>
			
			<?php
			$resultaa = mysqli_query($mysql, "SELECT * FROM `account`");
			while ($name = mysqli_fetch_assoc($resultaa)){
				if($videos['id_ac']==$name['email']){
					?> <img class="cras" src="../donloads/avatars/<?php echo $name['avatar']; ?>" alt="Фото">
					<a class="pos" href="">  <?php echo $name['name']; ?> </a><?php
				}
				
			}?> 	
			<a href="">  <?php echo $videos['name_video']; ?> </a>
				<div class="opst">
					
                </div>
            <?php }?>
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
			<div id="error002" class="error">
				<h1>Взлом системы!</h1>
			</div>
	</div>
			
			<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		
			<script src="js/slick.min.js"></script>
		
			<script src="https://kit.fontawesome.com/09e82d9ae2.js" crossorigin="anonymous"></script>

			<script src="js/script.js"></script>

			<script src="js/exit.js"></script>

			<script src="js/perehod2.js"></script>
		</body>
		</html>
<?php		
	}
?>