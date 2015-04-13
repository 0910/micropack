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
		$idOffices = mysql_real_escape_string($_POST['idOffices']);
		$title = mysql_real_escape_string($_POST['title']);
		$body = mysql_real_escape_string($_POST['body']);
		$image = $_POST['image'];
		$orderby = $_POST['orderby'];

		// actualizamos la fecha de modificacion y de publicacion
		$fModificacion = date("Y-m-d H:i:s");
		$idUsuario = $arrUsuario['idUsuario'];
		// actualizamos los datos de registro en la db
		$query  = "UPDATE offices SET 
		title='$title', body='$body', orderby='$orderby', image='$image', idUsuario = '$idUsuario', fModificacion='$fModificacion' WHERE idOffices = '$idOffices'";
		$result = mysql_query($query, $dbConn) or die(mysql_error());	
	}
?>
