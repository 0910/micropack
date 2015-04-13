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
		$client = mysql_real_escape_string($_POST['client']);
		$title = mysql_real_escape_string($_POST['title']);
		$description = mysql_real_escape_string($_POST['description']);
		$client2 = mysql_real_escape_string($_POST['client2']);
		$title2 = mysql_real_escape_string($_POST['title2']);
		$description2 = mysql_real_escape_string($_POST['description2']);
		$client3 = mysql_real_escape_string($_POST['client3']);
		$title3 = mysql_real_escape_string($_POST['title3']);
		$description3 = mysql_real_escape_string($_POST['description3']);
		$images = $_POST['images'];
		$orderby = $_POST['orderby'];
		$category = $_POST['category'];
		$price = $_POST['price'];

		// inserto los datos de registro en la db	
		$fCreacion = date("Y-m-d H:i:s");
		$fModificacion = date("Y-m-d H:i:s");
		$idUsuario = $arrUsuario['idUsuario'];
		$query  = "INSERT INTO products (client,title,description,client2,title2,description2,client3,title3,description3,images,orderby,category,price,idUsuario,fCreacion,fModificacion) VALUES ('$client','$title','$description','$client2','$title2','$description2','$client3','$title3','$description3','$images','$orderby','$category','$price','$idUsuario','$fCreacion','$fModificacion')";
		$result = mysql_query($query, $dbConn) or die (mysql_error());
	}
?>
