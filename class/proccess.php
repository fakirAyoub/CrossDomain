<?php
//require_once("class_conexion.php");
header('Access-Control-Allow-Origin: *');
$nombre = "Oscar Manuel";
$alertaUser = array('error' => 'Fatal error user validation');
$array = array("mensaje" => "Hola desde otro punto de la red no tienes porque estar aqui");

		$objeto = array(
			'name' => $_POST["name"],
			'lastname' => $_POST["last-name"],
			'email' => $_POST["mail"],
			'cellPhone' => $_POST["cellPhone"]
		);		

    if(isset($_POST['name'])){ // Si es una petición cross-domain
    	if ($objeto["name"] == $nombre) {
			echo '('.json_encode($alertaUser).')';
		}else{
			echo '('.json_encode($objeto).')';
		}        
    	//$sql = "insert into jsonp_cross (id,name,lastname,mail,cellPhone) values (null,'".$name."','".$lastname."','".$email."','".$cellPhone."')";           
    	//$res=mysql_query($sql,Conectar::con());
    }else {
       echo json_encode($array);
    }
           
?>