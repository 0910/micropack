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
		$idProduct = mysql_real_escape_string($_POST['idProduct']);
		$client = mysql_real_escape_string($_POST['client']);
		$title = mysql_real_escape_string($_POST['title']);
		$description = mysql_real_escape_string($_POST['description']);
		$client2 = mysql_real_escape_string($_POST['client2']);
		$title2 = mysql_real_escape_string($_POST['title2']);
		$description2 = mysql_real_escape_string($_POST['description2']);
		$client3 = mysql_real_escape_string($_POST['client3']);
		$title3 = mysql_real_escape_string($_POST['title3']);
		$description3 = mysql_real_escape_string($_POST['description3']);
		$category = $_POST['category'];
		$price = $_POST['price'];
		$images = $_POST['images'];
		$cover = $_POST['cover'];
		$orderby = $_POST['orderby'];

		// actualizamos la fecha de modificacion y de publicacion
		$fModificacion = date("Y-m-d H:i:s");
		$idUsuario = $arrUsuario['idUsuario'];
		// actualizamos los datos de registro en la db
		$query  = "UPDATE products SET 
		client='$client', title='$title', description='$description', client2='$client2', title2='$title2', description2='$description2', client3='$client3', title3='$title3', description3='$description3', images='$images', cover='$cover', orderby='$orderby', category='$category', price='$price', idUsuario = '$idUsuario', fModificacion='$fModificacion' WHERE idProduct = '$idProduct'";
		$result = mysql_query($query, $dbConn) or die(mysql_error());	
	}
?>
