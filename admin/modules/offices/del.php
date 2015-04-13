<?php
	// iniciamos session
	session_start();

	// archivos necesarios
	require_once '../../includes/config.php';
	require_once '../../includes/conexion.php';
	require_once '../../includes/esUsuario.php';
		
	include("../../inc/inc_checkuser.php");
		
	// borramos un registro
	$idQuotes = mysql_real_escape_string($_GET['idQuotes']);
	if(!empty($idQuotes)){
		$query  = "DELETE FROM quotes WHERE idQuotes = ('$idQuotes')";
		mysql_query($query, $dbConn) or die (mysql_error());
		header('Location: index.php?deletedmsg=Copete eliminada');
	}
?>