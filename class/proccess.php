<?php
header('Access-Control-Allow-Origin: *');//================== cabecera para la coneccion crossDomain por el metodo pot de jquery

//================================== Llamado de archivos externos que integran el proceso =============================================
require_once("classConexion.php");
require_once("ClassInsert.php");
require_once("ClassSelect.php");


// ================================= Instacia de clases para la el proceso de registro de usuarios =====================================
$insert = new Insert();
$select = new Select();


// ================================= Si por alguna razon el usuario ingresa a esta direccion ===========================================

$array = array("mensaje" => "Hola desde otro punto de la red no tienes porque estar aqui");

// ================================= Proceso de insercion de usuario a la base de datos ================================================


    if(isset($_POST['name'])){ // Si es una petición cross-domain

    	$objeto = array(
			'name' => $_POST["name"],
			'lastname' => $_POST["last-name"],
			'email' => $_POST["mail"],
			'cellPhone' => $_POST["cellPhone"]
		);

    	$selectUser = $select->SelectUser($objeto["email"]);//--- Raliza la validacion del usuario, si el usuario esta ejecuta un ext
		$insert->insert_user($objeto["name"],$objeto["lastname"],$objeto["email"],$objeto["cellPhone"]);//--- De lo contrario inserta el usuario
		
		echo json_encode($objeto);
	        
    }else {
       echo json_encode($array);
    }
           
?>