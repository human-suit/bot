$(document).ready(function(){
	$('.slider').slick({
		slidesToShow:1,
		speed:500,
		dots:true,
		infinite:false,
	});
});

let exit = document.getElementById("exit_bu");

exit.onclick = function(){
				$.ajax({
					method: "POST",
					url: "php/exit.php",
					data: {}
				})
					.done(function( msg ) {
						window.location.replace("index.php");
	});
}

let load_video = document.getElementById("load_video");

load_video.onclick = function(){
					var name  = $('input.nazvanie').val();
					var opis  = $('textarea.opisanie_text').val();
					var date_t  = $('input.date').val();
					var mesto  = $('input.mesto').val();
					var kategory= $('#kategory').val();
					$.ajax({
				  method: "POST",
				  url: "php/load_video.php",
				  data: {nazvanie: name, opisanie_text: opis, date: date_t, mesto: mesto, kategory: kategory}
				})
				  .done(function( msg ) {
				  	if (name=="" || opis=="" || date_t=="" || mesto=="") {
				  		alert("Заполните все поля!");
				  	}
				  	else{
				  		alert( "Загрузка: " + msg);
						window.location.replace("studio_video.php");
				  	}
				  });
}
