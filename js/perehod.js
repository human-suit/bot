let n = document.getElementById("d1");
n.onclick = function(){
	let x = "v1";
	perehod(x);
}
	function perehod(x){
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
	