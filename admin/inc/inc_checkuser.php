<?php
	// obtengo puntero de conexion con la db
	$dbConn = conectar();

	// verificamos que no este conectado el usuario
	if (!empty($_SESSION['admin_user_email']) && !empty($_SESSION['admin_user_password'])){
		$arrUsuario = esUsuario($_SESSION['admin_user_email'], $_SESSION['admin_user_password'], $dbConn);
	}
	// verificamos que sea un admin
	if (empty($arrUsuario) || $arrUsuario['type'] != 'admin'){
		header('Location:' .$rootpath.'admin/login.php');
		die;
	}
?>