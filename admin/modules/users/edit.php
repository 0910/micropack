<?php
	// iniciamos session
	session_start();

	// archivos necesarios
	require_once '../../includes/config.php';
	require_once '../../includes/conexion.php';
	require_once '../../includes/esUsuario.php';
		
	include("../../inc/inc_checkuser.php");

	if (empty($_GET['idUser'])) {
		header("Location: index.php");
	}
	if (!empty($_GET['idUser'])) {
		$query = "SELECT idUser, name, password, email FROM users WHERE idUser = {$_GET['idUser']}";
		$resultado = mysql_query($query, $dbConn) or die(mysql_error());
		$row = mysql_fetch_assoc($resultado);
		$idUser = $row['idUser'];
		$name = $row['name'];
		$password = $row['password'];
		$email = $row['email'];
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php include("../../inc/inc_head.php"); ?>
		<title><?php echo $admin_name ?> · ADMIN · Edit</title>
	</head>
	<body>
		<?php include("../../inc/inc_menu.php"); ?>
		<div class="container">
			<h2 class="sub-header">
				Edit user: <? echo $name; ?>
				<span>
					<a href="index.php"class="goback">
						<i class="fa fa-chevron-left"></i> go back
					</a>
				</span>
			</h2>
			<hr>
			<div id="user" class="row" idUser="<? echo $idUser; ?>">
				<div class="col-md-12">
					<form class="form-signin" role="form" autocomplete="off">
						<div class="form-group">
							<label for="title">User name</label>
							<input type="text" class="form-control" name="name" id="name" placeholder="complete with user name" value="<? echo $name; ?>">
						</div>
						<hr>
						<div class="form-group">
							<label for="description">Password</label>
							<input rows="10" type="password" class="form-control" name="password" id="password" placeholder="complete with your password">
						</div>
						<hr>
						<div class="form-group">
							<label for="description">E-mail</label>
							<input rows="10" type="text" class="form-control" name="email" id="email" placeholder="complete with your e-mail" value="<? echo $email; ?>">
						</div>
						<hr>
						<div class="form-group">
							<div class="col-md-4 col-md-offset-4">
								<div class="col-md-6"><button id="save" class="btn btn-lg btn-success btn-block" type="submit">save</button></div>
								<div class="col-md-6"><a href="index.php" class="btn btn-lg btn-danger btn-block">cancel</a></div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<footer>
			<?php include("../../inc/inc_footer.php"); ?>
		</footer>
		<script type="text/javascript">
			$(function(){
				$('#save').click(function(event){
					event.preventDefault();

					// guardo las variables para enviar
					var idUser = $('#user').attr('idUser');
					var name = $('#name').val();
					var password = $('#password').val();
					var email = $('#email').val();

					// envio las variables por Ajax
					$.ajax({
						type: "POST",
						url: "save.php",
						cache: false,
						data: {idUser:idUser, name:name, password:password, email:email},
						error: function(obj, msg, obj2) { console.log(msg); },
						complete: function(){
							window.location = 'index.php?createdmsg=User updated!';
						}
					});
					return false;
				});
			});
		</script>
	</body>
</html>