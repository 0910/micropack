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
		$idNews = mysql_real_escape_string($_POST['idNews']);
		$title = mysql_real_escape_string($_POST['title']);
		$body = mysql_real_escape_string($_POST['body']);
		$title2 = mysql_real_escape_string($_POST['title2']);
		$body2 = mysql_real_escape_string($_POST['body2']);
		$title3 = mysql_real_escape_string($_POST['title3']);
		$body3 = mysql_real_escape_string($_POST['body3']);
		$date = $_POST['date'];
		$link = $_POST['link'];
		$images = $_POST['images'];
		$cover = $_POST['cover'];
		$orderby = $_POST['orderby'];

		// actualizamos la fecha de modificacion y de publicacion
		$fModificacion = date("Y-m-d H:i:s");
		$idUsuario = $arrUsuario['idUsuario'];
		// actualizamos los datos de registro en la db
		$query  = "UPDATE news SET 
		title='$title', body='$body', title2='$title2', body2='$body2', title3='$title3', body3='$body3', date='$date', link='$link', images='$images', cover='$cover', orderby='$orderby', idUsuario = '$idUsuario', fModificacion='$fModificacion' WHERE idNews = '$idNews'";
		$result = mysql_query($query, $dbConn) or die(mysql_error());	
	}
?>
