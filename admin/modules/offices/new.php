<?php
	// iniciamos session
	session_start();

	// archivos necesarios
	require_once '../../includes/config.php';
	require_once '../../includes/conexion.php';
	require_once '../../includes/esUsuario.php';
		
	include("../../inc/inc_checkuser.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php include("../../inc/inc_head.php"); ?>
		<title><?php echo $admin_name ?> · ADMIN · Create</title>
	</head>
	<body>
		<?php include("../../inc/inc_menu.php"); ?>
		<div class="container">
			<h2 class="sub-header">
				Crear nuevo copete
				<span>
					<a href="index.php"class="goback">
						<i class="fa fa-chevron-left"></i> volver
					</a>
				</span>
			</h2>
			<hr>
			<div class="row">
				<div class="col-md-12">
					<form class="form-signin" role="form">
						<div class="form-group">
							<label for="price">Nombre</label>
							<input type="text" class="form-control" name="title" id="title" placeholder="completar con el nombre. Ej: Micropack Brasil">
						</div>
						<hr>
						<div class="form-group">
							<label for="price">Información</label>
							<textarea rows="10" type="text" class="form-control" name="body" id="body" placeholder="completar con la información de la oficina."></textarea>
						</div>
						<hr>
						<div class="form-group">
							<label for="title">Imagen</label>
							<span class="btn btn-success fileinput-button">
								<i class="fa fa-plus"></i>
								<span>Seleccionar imagen...</span>
								<!-- The file input field used as target for the file upload widget -->
								<input id="fileupload" type="file" name="" multiple>
							</span>
							<br>
							<br>
							<!-- The global progress bar -->
							<div id="progress" class="progress">
								<div class="progress-bar progress-bar-success"></div>
							</div>
							<!-- The container for the uploaded files -->
							<div id="files" class="files"></div>
						</div>
						<hr>
						<div class="form-group">
							<label for="price">Ordenar</label>
							<p class="infobubbles bg-info text-info"><span><i class="fa fa-info-circle"></i> Serán ordenados en forma DESCENDENTE segun el número asignado</span></p>
							<input type="text" class="form-control" name="orderby" id="orderby" placeholder="completar con el orden para los productos">
						</div>
						<hr>
						<div class="form-group">
							<div class="col-md-4 col-md-offset-4">
								<div class="col-md-6"><button id="save" class="btn btn-lg btn-success btn-block" type="submit">Crear</button></div>
								<div class="col-md-6"><a href="index.php" class="btn btn-lg btn-danger btn-block">Cancelar</a></div>
							</div>
						</div>
						<hr>
						<div class="form-group">
							<label for="price">Ordenar</label>
							<p class="infobubbles bg-info text-info"><span><i class="fa fa-info-circle"></i> Serán ordenados en forma DESCENDENTE segun el número asignado</span></p>
							<input type="text" class="form-control" name="orderby" id="orderby" placeholder="completar con el orden para los productos">
						</div>
						<hr>
						<div class="form-group">
							<div class="col-md-4 col-md-offset-4">
								<div class="col-md-6"><button id="save" class="btn btn-lg btn-success btn-block" type="submit">Crear</button></div>
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
				$('#fileupload').fileupload({
					url: '../../uploader/server/php/',
					dataType: 'json',
					change: function (e, data) {
						$.each(data.files, function (index, file) {
							//alert('Selected file: ' + file.name);
						});
					},
					submit: function (e, data) {
						$('#imageProgress').fadeIn('fast');
					},
					done: function (e, data) {
						covernum = 0;
						$.each(data.result.files, function(index, file){
							var url = this.url;
							$('#imageProgress').hide();
							$('#files').html('').append('<div class="uploadedImage col-md-2" style="text-align:center;"><img class="img-thumbnail" src="' +url+ '" alt="loading..."/><div class="commands"><a class="deleteimg" href="#">delete <span><i class="fa fa-trash-o"></i></span></a><label>Cover</label></div></div>').fadeIn(300);
							$('#prog').text('Done!');
							$('.progbar').fadeOut('fast');
							$('.deleteimg').click(function(event){
								event.preventDefault();
								$(this).parents('.uploadedImage').remove();
							});
						});
					},
					progress: function(e, data){
						var progress = parseInt(data.loaded / data.total * 100, 10);
						$('#prog').text(progress + "%");
						$('.progbar').css('width', progress + "%");
					}
				}).prop('disabled', !$.support.fileInput).parent().addClass($.support.fileInput ? undefined : 'disabled');
				$('#save').click(function(event){
					event.preventDefault();

					// guardo las variables para enviar
					var title = $('#title').val();
					var body = $('#body').val();
					var image = $('.uploadedImage').find('img').attr('src');
					var orderby = $('#orderby').val();

					// validar campos
					error = [];
					if (!title) { error.push('\n\rEs obligatorio completar el nombre de la oficina'); }
					if (!body) { error.push('\n\rEs obligatorio completar la información'); }
					if (error.length > 0) {
						alert(error);
						return false;
					}

					// envio las variables por Ajax
					$.ajax({
						type: "POST",
						url: "create.php",
						cache: false,
						data: {title:title, body:body, image:image, orderby:orderby},
						error: function(obj, msg, obj2) { console.log(msg); },
						complete: function(){
							window.location = 'index.php?createdmsg=Oficina creada!';
						}
					});
					return false;
				});
			});
		</script>
	</body>
</html>