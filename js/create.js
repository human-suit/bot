let button_create = document.getElementById("button_create");

button_create.onclick = function(){

					var file_data = $('#file').prop('files')[0];
					var form_data = new FormData();
					form_data.append('file', file_data);
					if(file == ''){
						
					}
					else{
					$.ajax({
				  method: "POST",
				  url: "php/create.php",
				  cache: false,
				  contentType: false,
				  processData: false,
				  data: form_data
				})
				  .done(function( msg ) {
				    alert(msg);
				    window.location.replace("magazine.php");
				  });
			}
}


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


let GodObj = {};
function getId(event){
	let id_redact = event.target.id;
	GodObj.pers = id_redact;
}


let but_red = document.getElementById("button_redact");

but_red.onclick = function(){
					let name  = $('input.title_t').val();
					let opisani  = $('textarea.opisani').val();
					let sum = $('input.sum').val();
					let per = GodObj.pers;
					if(sum < 0 ){
						alert("Ошибка число меньше нуля!");
					}
					else if(name == "" && opisani == "" && sum == ""){
						alert("Заполните все поля!")
					}
					else{

					$.ajax({
				  method: "POST",
				  url: "php/redact.php",
				  data: {title_t: name, opisani: opisani, sum: sum, per: per }
				})
				  .done(function( msg ) {
				    alert( "Сохранено: " + msg);
				    window.location.replace("magazine.php");
				  });
			}	
}

let button_del = document.getElementById("button_del");

button_del.onclick = function(){
					let per = GodObj.pers;
					if(per ==''){
						alert("Error 1000");
					}
					else{

					$.ajax({
				  method: "POST",
				  url: "php/delet_tovar.php",
				  data: {per: per }
				})
				  .done(function( msg ) {
				    alert( "Удалено: " + msg);
				    window.location.replace("magazine.php");
				  });
			}	
}