<?php
	// iniciamos session
	session_start();

	// archivos necesarios
	require_once '../../includes/config.php';
	require_once '../../includes/conexion.php';
	require_once '../../includes/esUsuario.php';
		
	include("../../inc/inc_checkuser.php");

	if (empty($_GET['idQuotes'])) {
		header("Location: index.php");
	}
	if (!empty($_GET['idQuotes'])) {
		$query = "SELECT idQuotes, body, body2, body3, orderby FROM quotes WHERE idQuotes = {$_GET['idQuotes']}";
		$resultado = mysql_query($query, $dbConn) or die(mysql_error());
		$row = mysql_fetch_assoc($resultado);
		$idQuotes = $row['idQuotes'];
		$body = $row['body'];
		$body2 = $row['body2'];
		$body3 = $row['body3'];
		$orderby = $row['orderby'];
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
		<div class="container">
			<h2 class="sub-header">
				Editar copete
				<span>
					<a href="index.php"class="goback">
						<i class="fa fa-chevron-left"></i> volver
					</a>
				</span>
			</h2>
			<hr>
			<div id="product" class="row" idQuotes="<? echo $idQuotes; ?>">
				<div class="col-md-12">
					<form role="form" action="save.php" method="POST" enctype="multipart/form-data">
						<div role="tabpanel">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs" role="tablist" id="langtabs">
								<li role="presentation" class="active"><a href="#esp" aria-controls="esp" role="tab" data-toggle="tab">Español</a></li>
								<li role="presentation"><a href="#eng" aria-controls="profile" role="tab" data-toggle="tab">Inglés</a></li>
								<li role="presentation"><a href="#por" aria-controls="messages" role="tab" data-toggle="tab">Portugúes</a></li>
							</ul>
							<!-- Tab panes -->
							<div class="tab-content">
							<!-- ESP -->
							<div role="tabpanel" class="tab-pane fade in active" id="esp">
								<div class="form-group">
									<label for="title">Cuerpo</label>
									<textarea rows="10" type="text" class="form-control" name="body" id="body" placeholder="completar con el cuerpo de la noticia en español"><? echo $body; ?></textarea>
								</div>
							</div>
							<!-- ENG -->
							<div role="tabpanel" class="tab-pane fade" id="eng">
								<div class="form-group">
									<label for="title">Cuerpo</label>
									<textarea rows="10" type="text" class="form-control" name="body2" id="body2" placeholder="completar con el cuerpo de la noticia en inglés"><? echo $body2; ?></textarea>
								</div>
							</div>
							<!-- POR -->
							<div role="tabpanel" class="tab-pane fade" id="por">
								<div class="form-group">
									<label for="title">Cuerpo</label>
									<textarea rows="10" type="text" class="form-control" name="body3" id="body3" placeholder="completar con el cuerpo de la noticia en portugués"><? echo $body3; ?></textarea>
								</div>
							</div>
						</div>
						<hr>
						<div class="form-group">
							<label for="price">Ordenar</label>
							<p class="infobubbles bg-info text-info"><span><i class="fa fa-info-circle"></i> Serán ordenados en forma DESCENDENTE segun el número asignado</span></p>
							<input type="text" class="form-control" name="orderby" id="orderby" placeholder="complete with product order" value="<? echo $orderby; ?>">
						</div>
						<hr>
						<div class="form-group">
							<div class="col-md-4 col-md-offset-4">
								<div class="col-md-6"><button id="save" class="btn btn-lg btn-success btn-block" type="submit">Guardar</button></div>
								<div class="col-md-6"><a href="index.php" class="btn btn-lg btn-danger btn-block">Cancelar</a></div>
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
					var idQuotes = $('#product').attr('idQuotes');
					//ESP
					var body = $('#body').val();
					//ENG
					var body2 = $('#body2').val();
					//POR
					var body3 = $('#body3').val();
					var orderby = $('#orderby').val();

					// validar campos
					error = [];
					if (!body) { error.push('\n\rEs obligatorio completar el cuerpo en español'); }
					if (!body2) { error.push('\n\rEs obligatorio completar el cuerpo en inglés'); }
					if (!body3) { error.push('\n\rEs obligatorio completar el cuerpo en portugués'); }
					if (error.length > 0) {
						alert(error);
						return false;
					}

					// envio las variables por Ajax
					$.ajax({
						type: "POST",
						url: "save.php",
						cache: false,
						data: {idQuotes:idQuotes, body:body, body2:body2, body3:body3, orderby:orderby},
						error: function(obj, msg, obj2) { console.log(msg); },
						complete: function(){
							window.location = 'index.php?createdmsg=Cambios guardados!';
						}
					});
					return false;
				});
			});
		</script>
	</body>
</html>








