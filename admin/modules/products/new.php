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
				Crear nuevo producto
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
									<label for="title">Cliente</label>
									<input type="text" class="form-control" name="client" id="client" placeholder="completar con el nombre del cliente">
								</div>
								<hr>
								<div class="form-group">
									<label for="title">Nombre</label>
									<input type="text" class="form-control" name="title" id="title" placeholder="completar con el nombre delñ producto">
								</div>
								<hr>
								<div class="form-group">
									<label for="description">Descripción</label>
									<textarea rows="10" type="text" class="form-control" name="description" id="description" placeholder="completar con la descripción del producto"></textarea>
								</div>
							</div>
							<!-- ENG -->
							<div role="tabpanel" class="tab-pane fade" id="eng">
								<div class="form-group">
									<label for="title">Cliente</label>
									<input type="text" class="form-control" name="client2" id="client2" placeholder="completar con el nombre del cliente">
								</div>
								<hr>
								<div class="form-group">
									<label for="title">Nombre</label>
									<input type="text" class="form-control" name="title2" id="title2" placeholder="completar con el nombre delñ producto">
								</div>
								<hr>
								<div class="form-group">
									<label for="description">Descripción</label>
									<textarea rows="10" type="text" class="form-control" name="description2" id="description2" placeholder="completar con la descripción del producto"></textarea>
								</div>
							</div>
							<!-- POR -->
							<div role="tabpanel" class="tab-pane fade" id="por">
								<div class="form-group">
									<label for="title">Cliente</label>
									<input type="text" class="form-control" name="client3" id="client3" placeholder="completar con el nombre del cliente">
								</div>
								<hr>
								<div class="form-group">
									<label for="title">Nombre</label>
									<input type="text" class="form-control" name="title3" id="title3" placeholder="completar con el nombre delñ producto">
								</div>
								<hr>
								<div class="form-group">
									<label for="description">Descripción</label>
									<textarea rows="10" type="text" class="form-control" name="description3" id="description3" placeholder="completar con la descripción del producto"></textarea>
								</div>
							</div>
						</div>
						<hr>
						<div class="form-group">
							<label for="title">Imágenes</label>
							<span class="btn btn-success fileinput-button">
								<i class="fa fa-plus"></i>
								<span>Seleccionar imágenes...</span>
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
							<label>Categoría</label>
							<select id="category" name="category">
								<option value="mega">Mega Exhibidores</option>
								<option value="botaderos">Botaderos</option>
								<option value="depie">Exhibidores de Pié</option>
								<option value="pallet">Box Pallet®</option>
								<option value="islas">Islas</option>
								<option value="mostrador">Exhibidores de Mostrador</option>
								<option value="automaticos">Displays Automáticos</option>
								<option value="packaging">Packaging</option>
								<option value="modushelf">ModuShelf®</option>
							</select>
						</div>
						<hr>
						<div class="form-group">
							<label>Premio</label>
							<select id="price" name="price">
								<option value="0">NO</option>
								<option value="1">SI</option>
							</select>
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
								<div class="col-md-6"><button id="save" class="btn btn-lg btn-success btn-block" type="submit">guardar</button></div>
								<div class="col-md-6"><a href="index.php" class="btn btn-lg btn-danger btn-block">cancelar</a></div>
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
				cover = '0';
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
							$('#files').append('<div class="uploadedImage col-md-2" style="text-align:center;"><img class="img-thumbnail" src="' +url+ '" alt="loading..."/><div class="commands"><a class="deleteimg" href="#">delete <span><i class="fa fa-trash-o"></i></span></a><label>Cover</label><input class="check" type="radio" name="cover" value="cover"></div></div>').fadeIn(300);
							$('#prog').text('Done!');
							$('.progbar').fadeOut('fast');
							$('.deleteimg').click(function(event){
								event.preventDefault();
								$(this).parents('.uploadedImage').remove();
							});
							covernum++
						});
						$('.check').click(function(event){
							cover = $(this).parents('.uploadedImage').index();
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
					//ESP
					var client = $('#client').val();
					var title = $('#title').val();
					var description = $('#description').val();
					//ENG
					var client2 = $('#client2').val();
					var title2 = $('#title2').val();
					var description2 = $('#description2').val();
					//POR
					var client3 = $('#client3').val();
					var title3 = $('#title3').val();
					var description3 = $('#description3').val();
					imgarr = [];
			    	$('.uploadedImage').each(function(index, value){
				      imgarr.push($(this).find('img').attr('src'));
					});
					var images = JSON.stringify(imgarr);
					var orderby = $('#orderby').val();
					var price = $('#price').val();
					var category = $('#category').val();

					// validar campos
					error = [];
					if (!title) { error.push('Es obligatorio completar el título en español'); }
					if (!client) { error.push('Es obligatorio completar el cliente en español'); }
					if (!description) { error.push('\n\rEs obligatorio completar el cuerpo en español'); }
					if (!title2) { error.push('\n\rEs obligatorio completar el título en inglés'); }
					if (!client2) { error.push('Es obligatorio completar el cliente en inglés'); }
					if (!description2) { error.push('\n\rEs obligatorio completar el cuerpo en inglés'); }
					if (!title3) { error.push('\n\rEs obligatorio completar el título en portugués'); }
					if (!client3) { error.push('Es obligatorio completar el cliente en portugués'); }
					if (!description3) { error.push('\n\rEs obligatorio completar el cuerpo en portugués'); }
					if (!price) { error.push('\n\rEs obligatorio indicar si tiene premio o no'); }
					if (!category) { error.push('\n\rEs obligatorio seleccionar la categoría'); }
					if (error.length > 0) {
						alert(error);
						return false;
					}

					// envio las variables por Ajax
					$.ajax({
						type: "POST",
						url: "create.php",
						cache: false,
						data: {client:client, title:title, description:description, client2:client2, title2:title2, description2:description2, client3:client3, title3:title3, description3:description3, images:images, cover:cover, orderby:orderby, price:price, category:category},
						error: function(obj, msg, obj2) { console.log(msg); },
						complete: function(){
							window.location = 'index.php?createdmsg=Producto creado!';
						}
					});
					return false;
				});
			});
		</script>
	</body>
</html>