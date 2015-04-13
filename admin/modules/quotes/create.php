<?php
	// activamos json
	header('Content-type: application/json');

	// iniciamos session
	session_start();

	// archivos necesarios
	require_once '../../includes/config.php';
	require_once '../../includes/conexion.php';
	require_once '../../includes/esUsuario.php';
		
	include("../../inc/inc_checkuser.php");

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		// definimos las variables
		$body = mysql_real_escape_string($_POST['body']);
		$body2 = mysql_real_escape_string($_POST['body2']);
		$body3 = mysql_real_escape_string($_POST['body3']);
		$orderby = $_POST['orderby'];

		// inserto los datos de registro en la db	
		$fCreacion = date("Y-m-d H:i:s");
		$fModificacion = date("Y-m-d H:i:s");
		$idUsuario = $arrUsuario['idUsuario'];
		$query  = "INSERT INTO quotes (body,body2,body3,orderby,idUsuario,fCreacion,fModificacion) VALUES ('$body','$body2','$body3','$orderby','$idUsuario','$fCreacion','$fModificacion')";
		$result = mysql_query($query, $dbConn) or die (mysql_error());
	}
?>
