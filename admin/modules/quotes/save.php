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
		$idQuotes = mysql_real_escape_string($_POST['idQuotes']);
		$body = mysql_real_escape_string($_POST['body']);
		$body2 = mysql_real_escape_string($_POST['body2']);
		$body3 = mysql_real_escape_string($_POST['body3']);
		$orderby = $_POST['orderby'];

		// actualizamos la fecha de modificacion y de publicacion
		$fModificacion = date("Y-m-d H:i:s");
		$idUsuario = $arrUsuario['idUsuario'];
		// actualizamos los datos de registro en la db
		$query  = "UPDATE quotes SET body='$body', body2='$body2', body3='$body3', orderby='$orderby', idUsuario = '$idUsuario', fModificacion='$fModificacion' WHERE idQuotes = '$idQuotes'";
		$result = mysql_query($query, $dbConn) or die(mysql_error());	
	}
?>
