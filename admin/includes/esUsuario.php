<?php
	function esUsuario ($admin_user_email, $admin_user_password, $conexion) {

		// verifica que esten los dos campos completos.
		if ($admin_user_email=='' || $admin_user_password=='') return false;
		
		// busqueda de los datos de usuarios para loguear.
		$query = "SELECT idUser, name, password, email, type FROM users WHERE email = '$admin_user_email'";
		$resultado = mysql_query ($query, $conexion);
		$row = mysql_fetch_array ($resultado);
		$password_from_db = $row['password'];
		unset($query);
		
		// verifica que el pass enviado sea igual al pass de la db.
		if ($password_from_db == $admin_user_password) {
			return $row;
		} 
		else return false;
	}
?>