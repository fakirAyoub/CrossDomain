<?php
//require_once("class_conexion.php");
$nombre = "Oscar Manuel";
$alertaUser = array('error' => 'Fatal error user validation');
$array = array("mensaje" => "Hola desde otro punto de la red no tienes porque estar aqui");

		$objeto = array(
			'name' => $_GET["name"],
			'lastname' => $_GET["last-name"],
			'email' => $_GET["mail"],
			'cellPhone' => $_GET["cellPhone"]
		);		

    if(isset($_GET['callback'])){ // Si es una petición cross-domain
    	if ($objeto["name"] == $nombre) {
			echo $_GET['callback'].'('.json_encode($alertaUser).')';
		}else{
			echo $_GET['callback'].'('.json_encode($objeto).')';
		}        
    	//$sql = "insert into jsonp_cross (id,name,lastname,mail,cellPhone) values (null,'".$name."','".$lastname."','".$email."','".$cellPhone."')";           
    	//$res=mysql_query($sql,Conectar::con());
    }else {
       echo json_encode($array);
    }
           
?>