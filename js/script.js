$(document).ready(function(){
	$('.slider').slick({
		slidesToShow:3,
		speed:500,
	});
});
$(document).ready(function(){
	$('.slider_2').slick({
		slidesToShow:5,
		speed:500,
	});
});
let tr = 0;

let switcMode = document.getElementById("dark");

switcMode.onclick = function(){
	let theme = document.getElementById("theme");

	if (theme.getAttribute("href")=="css/index_main2.css"){
		theme.href = "css/darkmodes.css";
	} else{
		theme.href = "css/index_main2.css";
	}
}
let filter = document.getElementById("filter");

filter.onclick = function(){

	let seat  = $('input.searth_text').val();
	if(seat ==''){
		alert('Для поиска поля не должно быть пустым!')
	}
	else{
	$.ajax({
  method: "POST",
  url: "php/filter.php",
  data: {searth_text: seat}
})
  .done(function( msg ) {
	window.location.replace("filter.php");
  });
}	
}

let next = document.getElementById("1");
next.onclick = function(){
	let x = "vid1";
	perehod(x);
}
let next2 = document.getElementById("2");
next2.onclick = function(){
	let x = "vid2";
	perehod(x);
}
let next3 = document.getElementById("3");
next3.onclick = function(){
	let x = "vid3";
	perehod(x);
}
let next4 = document.getElementById("4");
next4.onclick = function(){
	let x = "vid4";
	perehod(x);
}
let next5 = document.getElementById("5");
next5.onclick = function(){
	let x = "vid5";
	perehod(x);
}
	function perehod(x){
		let src = document.getElementById(x);
		let id = src.getAttribute("src");

			$.ajax({	
					  method: "POST",
					  url: "php/video.php",
					  data: {"id":id}
					})
					  .done(function( msg ) {
					    window.location.replace("show.php");
					  });
	}
	let vxod = document.getElementById("vxod_but");
	let n = document.getElementById("v1");
	n.onclick = function(){
		let x = "v1";
		let per = x;
	
			$.ajax({
				method: "POST",
				url: "php/perehod.php",
				data: {per: per }
			  })
				.done(function( msg ) {
				  window.location.replace("list_video.php");
				});
	}
vxod.onclick = function(){
					let email  = $('input.email_vxod').val();
					let password = $('input.password_vxod').val();
					if(email == '' || password == ''){
						
					}
					else{

					$.ajax({
				  		method: "POST",
				  		url: "php/prov.php",
				  		data: {email_vxod: email, password_vxod: password }
				})
				.done(function(	msg ) {
					if ( msg == "Пользователя не существует!" ) {
						alert(msg);
					}
					else{
						window.location.replace("cabinet.php");
					}
					
				  });
			
			}

	let input_email = document.getElementById("email_vxod");
	let input_pass = document.getElementById("password_vxod");
	if (input_email.value != '' && input_pass.value != ''){
		document.getElementById("email_vxod").style.borderBottom="1px solid #3EA6FF";
		document.getElementById("password_vxod").style.borderBottom="1px solid #3EA6FF";
	} else if(input_email.value == '' && input_pass.value == ''){
		document.getElementById("email_vxod").style.borderBottom="1px solid red";
		document.getElementById("password_vxod").style.borderBottom="1px solid red";
		setTimeout(open, 0.3 * 1000, 0.3);
		setTimeout(close, 4 * 1000, 4);
	} else if(input_email.value == '' &&  input_pass.value == ''){
		document.getElementById("email_vxod").style.borderBottom="1px solid red";
		document.getElementById("password_vxod").style.borderBottom="1px solid red";
		setTimeout(open, 0.3 * 1000, 0.3);
		setTimeout(close, 4 * 1000, 4);
	} else if(input_email.value == ''){
		document.getElementById("email_vxod").style.borderBottom="1px solid red";
		setTimeout(open, 0.3 * 1000, 0.3);
		setTimeout(close, 4 * 1000, 4);
	} else if(input_pass.value == ''){
		document.getElementById("password_vxod").style.borderBottom="1px solid red";
		setTimeout(open, 0.3 * 1000, 0.3);
		setTimeout(close, 4 * 1000, 4);
	}  else{
		document.getElementById("email_vxod").style.borderBottom="1px solid red";
		document.getElementById("password_vxod").style.borderBottom="1px solid red";
		setTimeout(open, 0.3 * 1000, 0.3);
		setTimeout(close, 4 * 1000, 4);
	}

}

const open = delay => {
	if (tr == 0) {
		document.getElementById("error").className +=" open";
	}
	else{
		document.getElementById("error002").className +=" open";
	}
};
const close = delay => {
	if (tr == 0) {
		document.getElementById("error").className ="error";
	}
	else{
		document.getElementById("error002").className ="error";
		tr = 0;
	}
 	document.getElementById("name_reg").style.borderBottom="1px solid #3EA6FF";
	document.getElementById("email_reg").style.borderBottom="1px solid #3EA6FF";
	document.getElementById("password_reg").style.borderBottom="1px solid #3EA6FF";
	document.getElementById("email_vxod").style.borderBottom="1px solid #3EA6FF";
	document.getElementById("password_vxod").style.borderBottom="1px solid #3EA6FF";
};

let button_register = document.getElementById("register");

button_register.onclick = function(){

					let name  = $('input.name_reg').val();
					let email  = $('input.email_reg').val();
					let password = $('input.password_reg').val();
					let input_name = document.getElementById("name_reg");
					let input_email = document.getElementById("email_reg");
					let input_pass = document.getElementById("password_reg");
					if(name =='' || email == '' || password == ''){
						
					}
					else if(input_name.value.length > '20' || input_email.value.length > '101'|| input_pass.value.length > '20'){

					} 
					else{

					$.ajax({
				  method: "POST",
				  url: "php/otpravka.php",
				  data: {name_reg: name, email_reg: email, password_reg: password }
				})
				  .done(function( msg ) {
				    alert( "Зарегестрирован: " + msg);
				    window.location.replace("cabinet.php");
				  });
			}	

	if(input_name.value == '' && input_email.value == '' && input_pass.value == ''){
		document.getElementById("name_reg").style.borderBottom="1px solid red";
		document.getElementById("email_reg").style.borderBottom="1px solid red";
		document.getElementById("password_reg").style.borderBottom="1px solid red";
		setTimeout(open, 0.3 * 1000, 0.3);
		setTimeout(close, 4 * 1000, 4);
	} else if(input_name.value.length > '20'){
		document.getElementById("name_reg").style.borderBottom="1px solid red";
		tr = 1;
		setTimeout(open, 0.3 * 1000, 0.3);
		setTimeout(close, 4 * 1000, 4);
	} else if(input_email.value.length > '101'){
		document.getElementById("email_reg").style.borderBottom="1px solid red";
		tr = 1;
		setTimeout(open, 0.3 * 1000, 0.3);
		setTimeout(close, 4 * 1000, 4);
	} else if(input_pass.value.length > '20'){
		document.getElementById("password_reg").style.borderBottom="1px solid red";
		tr = 1;
		setTimeout(open, 0.3 * 1000, 0.3);
		setTimeout(close, 4 * 1000, 4);
	} else if(input_name.value == '' && input_email.value == ''){
		document.getElementById("name_reg").style.borderBottom="1px solid red";
		document.getElementById("email_reg").style.borderBottom="1px solid red";
		setTimeout(open, 0.3 * 1000, 0.3);
		setTimeout(close, 4 * 1000, 4);
	} else if(input_name.value == '' && input_pass.value == ''){
		document.getElementById("name_reg").style.borderBottom="1px solid red";
		document.getElementById("password_reg").style.borderBottom="1px solid red";
		setTimeout(open, 0.3 * 1000, 0.3);
		setTimeout(close, 4 * 1000, 4);
	} else if(input_email.value == '' &&  input_pass.value == ''){
		document.getElementById("email_reg").style.borderBottom="1px solid red";
		document.getElementById("password_reg").style.borderBottom="1px solid red";
		setTimeout(open, 0.3 * 1000, 0.3);
		setTimeout(close, 4 * 1000, 4);
	} else if(input_name.value == ''){
		document.getElementById("name_reg").style.borderBottom="1px solid red";
		setTimeout(open, 0.3 * 1000, 0.3);
		setTimeout(close, 4 * 1000, 4);
	} else if(input_email.value == ''){
		document.getElementById("email_reg").style.borderBottom="1px solid red";
		setTimeout(open, 0.3 * 1000, 0.3);
		setTimeout(close, 4 * 1000, 4);
	} else if(input_pass.value == ''){
		document.getElementById("password_reg").style.borderBottom="1px solid red";
		setTimeout(open, 0.3 * 1000, 0.3);
		setTimeout(close, 4 * 1000, 4);
	}  else{
		document.getElementById("name_reg").style.borderBottom="1px solid red";
		document.getElementById("email_reg").style.borderBottom="1px solid red";
		document.getElementById("password_reg").style.borderBottom="1px solid red";
		setTimeout(open, 0.3 * 1000, 0.3);
		setTimeout(close, 4 * 1000, 4);
	}
}
