<?php
	$data = [
	"seat" => filter_var(trim($_POST['searth_text']),
	FILTER_SANITIZE_STRING),
	];
	setcookie('filter', $data["seat"], time() + 3600, "/");
	exit();
	
?>