<?php
	// iniciamos session
	session_start();
	
	// archivos necesarios
	require_once 'includes/config.php';
	require_once 'includes/conexion.php';
	require_once 'includes/esUsuario.php';
		
	// obtengo puntero de conexion con la db
	$dbConn = conectar();
	
	// verificamos que no este conectado el usuario
	if (!empty($_SESSION['admin_user_email']) && !empty($_SESSION['admin_user_password'])){
		$arrUsuario = esUsuario($_SESSION['admin_user_email'], $_SESSION['admin_user_password'], $dbConn);
		header('Location: index.php');
	}
	if(!empty($_POST)){
		$admin_user_email = mysql_real_escape_string($_POST['admin_user_email']);
		$admin_user_password = mysql_real_escape_string($_POST['admin_user_password']);

		if($arrUsuario = esUsuario($admin_user_email,md5($admin_user_password),$dbConn)){
			// definimos las sesiones
			$_SESSION['admin_user_name'] = $arrUsuario['name'];
			$_SESSION['admin_user_email'] = $arrUsuario['email'];
			$_SESSION['admin_user_password'] = $arrUsuario['password'];
			header('Location: index.php?success=Succesfully logged in');
		}
		else {
			header("Location: login.php?error=invalid user or pass");
		}
	}
?>















