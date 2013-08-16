<?php
require_once("classConexion.php");

	class Insert{

		public function insert_user($name,$lastname,$email,$cellPhone){
			$sql = "insert into jos_user_app (id,name,lastname,mail,cellPhone) values (null,'".$name."','".$lastname."','".$email."','".$cellPhone."')";           
    		$enlace = Conectar::con();    	
    		if ($sentencia = mysqli_prepare($enlace,$sql)) {
    			mysqli_stmt_execute($sentencia); /* ejecutar la consulta */
    			mysqli_stmt_store_result($sentencia); /* almacenar el resultado */			
    			mysqli_stmt_close($sentencia);/* cerrar la sentencia */
    		}
		}

	}
	

?>