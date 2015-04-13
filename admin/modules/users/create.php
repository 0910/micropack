<?php
	// iniciamos session
	session_start();

	// archivos necesarios
	require_once '../../includes/config.php';
	require_once '../../includes/conexion.php';
	require_once '../../includes/esUsuario.php';
		
	include("../../inc/inc_checkuser.php");

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		// definimos las variables
		$name = htmlentities(mysql_real_escape_string($_POST['name']));
		$password = md5(htmlentities(mysql_real_escape_string($_POST['password'])));
		$email = htmlentities(mysql_real_escape_string($_POST['email']));
		$type = htmlentities(mysql_real_escape_string($_POST['type']));

		$sql = "SELECT * FROM users WHERE user='".$name."' OR email='".$email."'";
		$result = mysql_query($sql);

		if($row = mysql_fetch_array($result)) {
			$error['reusuario'] = 'El usuario ó email ya existe';
		}
		// si no hay errores insertamos el usuario
		if (empty($error)){
			$query  = "INSERT INTO users (name, password, email, type) VALUES ('$name','$password','$email', 'admin')";
			$result = mysql_query($query, $dbConn) or die(mysql_error());
		}
	} 
?>
