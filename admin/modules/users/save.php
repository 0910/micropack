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
		$idUser = mysql_real_escape_string(htmlentities($_POST['idUser']));
		$name = htmlentities(mysql_real_escape_string($_POST['name']));
		$password = md5(htmlentities(mysql_real_escape_string($_POST['password'])));
		$email = htmlentities(mysql_real_escape_string($_POST['email']));

		$sql = "SELECT * FROM users WHERE name='".$name."' OR email='".$email."'";
		$result = mysql_query($sql);

		// edito los datos de registro en la db
		$query  = "UPDATE users SET name='$name', password='$password', email='$email', type='admin' WHERE idUser = '$idUser'";
		$result = mysql_query($query, $dbConn) or die(mysql_error());
	}
?>
