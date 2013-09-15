<?php

require_once("classConexion.php");
	class Select{
		private $user = array();
		

		public function SelectUser($email,$pass){
            $UserAlert[] = array('error' => 'Fatal error user exist here');			

			$sql = "select * from jos_user_app where mail ='".$email."' and password = '".$pass."'";           
    		$enlace = Conectar::con();    

            if ($sentencia = mysqli_prepare($enlace,$sql)) {
                mysqli_stmt_execute($sentencia); /* ejecutar la consulta */
                mysqli_stmt_store_result($sentencia); /* almacenar el resultado */
                $result = mysqli_stmt_num_rows($sentencia);
                if ($result > 0 ) {
                    
                    if ($resultado = mysqli_query($enlace, $sql)) {
                    /* obtener el array asociativo */
                    while ($obj = mysqli_fetch_object($resultado)) {
                         $arr[] = array('name' => $obj->name,
                                       'lastname' => $obj->lastname,
                                       'mail' => $obj->mail,
                                       'password' => $obj->password,
                                       'cellPhone' => $obj->cellPhone
                            );
                    }
                    echo '' . json_encode($arr) . '';
                    /* liberar el conjunto de resultados */
                    mysqli_free_result($resultado);
                    }

                    exit();
                }else{
                    echo '' . json_encode($UserAlert) . '';
                }
                mysqli_stmt_close($sentencia);/* cerrar la sentencia */
            }

		}
	}
	

?>