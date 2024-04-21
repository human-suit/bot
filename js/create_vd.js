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
				  url: "php/create_vd.php",
				  cache: false,
				  contentType: false,
				  processData: false,
				  data: form_data
				})
				  .done(function( msg ) {
				    alert(msg);
					if(msg=='Файл не найден'){
						window.location.replace("studio_video.php");
					}
					else{

					}
				  });
			}
}