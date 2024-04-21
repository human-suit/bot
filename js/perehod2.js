$("button").on("click", function() {
	clas = $(this).attr("class");
	clas = clas.replace(/,.*/, "");
	clas = "vad"+clas;
	pro=clas;
	pro = pro.replace(/,.*/, "");
	if(pro=="vid"){
		alert(pro);
	}
	else{
		pereh(clas);
	}
});
function pereh(x){
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