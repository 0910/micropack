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
		$title = mysql_real_escape_string($_POST['title']);
		$body = mysql_real_escape_string($_POST['body']);
		$title2 = mysql_real_escape_string($_POST['title2']);
		$body2 = mysql_real_escape_string($_POST['body2']);
		$title3 = mysql_real_escape_string($_POST['title3']);
		$body3 = mysql_real_escape_string($_POST['body3']);
		$date = mysql_real_escape_string($_POST['date']);
		$link = mysql_real_escape_string($_POST['link']);
		$images = $_POST['images'];
		$cover = $_POST['cover'];
		$orderby = $_POST['orderby'];

		// inserto los datos de registro en la db	
		$fCreacion = date("Y-m-d H:i:s");
		$fModificacion = date("Y-m-d H:i:s");
		$idUsuario = $arrUsuario['idUsuario'];
		$query  = "INSERT INTO news (title,body,title2,body2,title3,body3,date,link,images,cover,orderby,idUsuario,fCreacion,fModificacion) VALUES ('$title','$body','$title2','$body2','$title3','$body3','$date','$link','$images','$cover','$orderby','$idUsuario','$fCreacion','$fModificacion')";
		$result = mysql_query($query, $dbConn) or die (mysql_error());
	}
?>
