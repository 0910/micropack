<?php
	// iniciamos session
	session_start();

	// archivos necesarios
	require_once 'includes/config.php';
	require_once 'includes/conexion.php';
	require_once 'includes/esUsuario.php';
		
	include("inc/inc_checkuser.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php include("inc/inc_head.php"); ?>
		<title><?php echo $admin_name ?> · ADMIN</title>
	</head>
	<body>
		<?php include("inc/inc_menu.php"); ?>
		<?php 
			if(isset($_GET['success'])){
				echo '<p class="infobubbles_center text-success bg-success"><span><i class="fa fa-check"></i></span> '. $_GET['success'] .'</p>';
			}
		?>
		<div class="jumbotron">
			<div class="container">
				<h1>Hola, <? echo $_SESSION['admin_user_name']; ?>!</h1>
				<p>Este es tu panel de administración para <?php echo $admin_name ?>. En el podrás administrar todos tus contenidos. Cualquier duda, no dudes en contactarnos para que podamos ayudarte: <a href="mailto:support@nuevediez.com.ar">support@nuevediez.com.ar</a></p>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-2" style="width:20%;">
					<h2>Productos</h2>
					<p>Ver y administrar productos</p>
					<p><a class="btn btn-default" href="modules/products" role="button">Ver &raquo;</a></p>
				</div>
				<div class="col-md-2" style="width:20%;">
					<h2>Novedades</h2>
					<p>Ver y administrar noticias</p>
					<p><a class="btn btn-default" href="modules/news" role="button">Ver &raquo;</a></p>
				</div>
				<div class="col-md-2" style="width:20%;">
					<h2>Copetes</h2>
					<p>Ver y administrar copetes</p>
					<p><a class="btn btn-default" href="modules/quotes" role="button">Ver &raquo;</a></p>
				</div>
				<div class="col-md-2" style="width:20%;">
					<h2>Oficinas</h2>
					<p>Ver y administrar oficinas</p>
					<p><a class="btn btn-default" href="modules/offices" role="button">Ver &raquo;</a></p>
				</div>
				<div class="col-md-2" style="width:20%;">
					<h2>Usuarios</h2>
					<p>Ver y administrar usuarios</p>
					<p><a class="btn btn-default" href="modules/users" role="button">Ver &raquo;</a></p>
				</div>
			</div>
			<footer>
				<?php include("inc/inc_footer.php"); ?>
			</footer>
		</div>
	</body>
</html>