<?php

require_once("classConexion.php");
	class Select{
		private $user = array();
		

		public function SelectUser($email){

			$UserAlert = array('error' => 'Fatal error user exist here');

			$sql = "select * from jos_user_app where mail ='".$email."'";           

    		$enlace = Conectar::con();    	
    		if ($sentencia = mysqli_prepare($enlace,$sql)) {
    			mysqli_stmt_execute($sentencia); /* ejecutar la consulta */
    			mysqli_stmt_store_result($sentencia); /* almacenar el resultado */
    			$result = mysqli_stmt_num_rows($sentencia);
    			if ($result > 0 ) {
    				echo json_encode($UserAlert);
    				exit();
    			}
    			mysqli_stmt_close($sentencia);/* cerrar la sentencia */
    		}
		}


	}
	

?>