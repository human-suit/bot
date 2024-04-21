<?php
        $mysql = new mysqli('localhost','root','','bd_strim');
	$data = [
                "title_t" => filter_var($_POST['title_t'],
                FILTER_SANITIZE_STRING),
                "opisani" => filter_var($_POST['opisani'],
                FILTER_SANITIZE_STRING),
                "sum" => filter_var($_POST['sum'],
                FILTER_SANITIZE_STRING),
                "per" => $_POST['per'],
                "id_ac" => $_COOKIE['user']
        ];
        $array = array(
                 
        );
        $array2 = array(
              "name_tovar",
              "opisanie_tovar",
              "sum",
        );
        $array3 = array(
                 
        );
        $title = $data['title_t'];
        $opisani = $data['opisani'];
        $sum = $data['sum'];
        $id = $data['per'];
        $id_ac = $data['id_ac'];
        $array[0] = $title;
        $array[1] = $opisani;
        $array[2] = $sum;
        $i=0;
        foreach ($array as $row) {
                if(empty($row)=='false'){
                        $result = mysqli_query($mysql, "SELECT * FROM `magazine`;");
                        while($vod = mysqli_fetch_assoc($result)){
                                if($_COOKIE['user'] == $vod['id_accounta'] && $id == $vod['id']){
                                        $array[$i] = $vod[$array2[$i]];    
                                }
                        }     
                } else{
                     $array3[$i] = $array[$i];  
                }
                $i=$i+1;
        }

        $connection = new PDO('mysql:host=localhost;dbname=bd_strim', 'root', '');
        $sql = "UPDATE `magazine` SET `name_tovar` = '$array[0]', `opisanie_tovar` = '$array[1]', `sum` = '$array[2]' WHERE `id` = '$id' and `id_accounta` = '$id_ac';";
        $statement = $connection->prepare($sql);
        $result = $statement->execute($data);

        exit();

?>