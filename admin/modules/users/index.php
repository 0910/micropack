<?php
	// iniciamos session
	session_start();

	// archivos necesarios
	require_once '../../includes/config.php';
	require_once '../../includes/conexion.php';
	require_once '../../includes/esUsuario.php';
		
	include("../../inc/inc_checkuser.php");

	// traemos listado de usuarios
	$arrQuery= array();
	$query = "SELECT * FROM users ORDER BY name ASC";
	$resultado = mysql_query($query, $dbConn);
	while ($row = mysql_fetch_assoc($resultado)){
		array_push($arrQuery,$row);
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php include("../../inc/inc_head.php"); ?>
		<title><?php echo $admin_name ?> · ADMIN</title>
	</head>
	<body>
		<?php include("../../inc/inc_menu.php"); ?>
		<?php 
			if(isset($_GET['createdmsg'])){
				echo '<p class="infobubbles_center text-success bg-success"><span><i class="fa fa-check"></i></span> '. $_GET['createdmsg'] .'</p>';
			}
			if(isset($_GET['deletedmsg'])){
				echo '<p class="infobubbles_center text-warning bg-warning"><span><i class="fa fa-times"></i></span> '. $_GET['deletedmsg'] .'</p>';
			}
		?>
		<div class="container">
			<h2 class="sub-header">
				Users
				<span>
					<a href="new.php"class="goback">
						<i class="fa fa-plus"></i> create new
					</a>
				</span>
			</h2>
			<hr>
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>ID #</th>
							<th>Name</th>
							<th>E-Mail</th>
							<th>Type</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
						<? foreach($arrQuery as $user){ ?>
							<tr>
								<td><? echo $user['idUser']; ?></td>
								<td><? echo $user['name']; ?></td>
								<td><? echo $user['email']; ?></td>
								<td><? echo $user['type']; ?></td>
								<td><a href="edit.php?idUser=<? echo $user['idUser']; ?>"><span><i class="fa fa-pencil"></i></span></a></td>
								<td><a href="del.php?idUser=<? echo $user['idUser']; ?>"><span><i class="fa fa-times"></i></span></a></td>
							</tr>
						<? } ?>
					</tbody>
				</table>
			</div>
		</div>
		<footer>
			<?php include("../../inc/inc_footer.php"); ?>
		</footer>
	</body>
</html>