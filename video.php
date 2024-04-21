<?php
$data = $_POST['id'];
setcookie('video', $data, time() + 3600, "/");
?>