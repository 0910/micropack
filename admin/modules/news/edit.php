<?php
	// iniciamos session
	session_start();

	// archivos necesarios
	require_once '../../includes/config.php';
	require_once '../../includes/conexion.php';
	require_once '../../includes/esUsuario.php';
		
	include("../../inc/inc_checkuser.php");

	if (empty($_GET['idNews'])) {
		header("Location: index.php");
	}
	if (!empty($_GET['idNews'])) {
		$query = "SELECT idNews, title, body, title2, body2, title3, body3, date, link, images, cover, orderby FROM news WHERE idNews = {$_GET['idNews']}";
		$resultado = mysql_query($query, $dbConn) or die(mysql_error());
		$row = mysql_fetch_assoc($resultado);
		$idNews = $row['idNews'];
		$title = stripslashes($row['title']);
		$body = $row['body'];
		$title2 = stripslashes($row['title2']);
		$body2 = $row['body2'];
		$title3 = stripslashes($row['title3']);
		$body3 = $row['body3'];
		$date = $row['date'];
		$link = $row['link'];
		$images = $row['images'];
		$imagesdecoded = json_decode($images);
		$cover = $row['cover'];
		$covernum = 0;
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
				Editar noticia: <? echo $title; ?>
				<span>
					<a href="index.php"class="goback">
						<i class="fa fa-chevron-left"></i> volver
					</a>
				</span>
			</h2>
			<hr>
			<div id="product" class="row" idNews="<? echo $idNews; ?>">
				<div class="col-md-12">
					<form role="form" action="save.php" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label for="date">Fecha</label>
							<input type="text" class="form-control" name="date" id="date" placeholder="completar con la fecha de la noticia" value="<? echo $date; ?>">
						</div>
						<hr>
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
									<label for="title">Título</label>
									<input type="text" class="form-control" name="title" id="title" placeholder="completar con el título de la noticia en español" value="<? echo $title; ?>">
								</div>
								<hr>
								<div class="form-group">
									<label for="title">Cuerpo</label>
									<textarea rows="10" type="text" class="form-control" name="body" id="body" placeholder="completar con el cuerpo de la noticia en español"><? echo $body; ?></textarea>
								</div>
							</div>
							<!-- ENG -->
							<div role="tabpanel" class="tab-pane fade" id="eng">
								<div class="form-group">
									<label for="title">Título</label>
									<input type="text" class="form-control" name="title2" id="title2" placeholder="completar con el título de la noticia en inglés" value="<? echo $title2; ?>">
								</div>
								<hr>
								<div class="form-group">
									<label for="title">Cuerpo</label>
									<textarea rows="10" type="text" class="form-control" name="body2" id="body2" placeholder="completar con el cuerpo de la noticia en inglés"><? echo $body2; ?></textarea>
								</div>
							</div>
							<!-- POR -->
							<div role="tabpanel" class="tab-pane fade" id="por">
								<div class="form-group">
									<label for="title">Título</label>
									<input type="text" class="form-control" name="title3" id="title3" placeholder="completar con el título de la noticia en portugués" value="<? echo $title3; ?>">
								</div>
								<hr>
								<div class="form-group">
									<label for="title">Cuerpo</label>
									<textarea rows="10" type="text" class="form-control" name="body3" id="body3" placeholder="completar con el cuerpo de la noticia en portugués"><? echo $body3; ?></textarea>
								</div>
							</div>
						</div>
						<hr>
						<div class="form-group">
							<label for="date">Link a la noticia</label>
							<input type="text" class="form-control" name="link" id="link" placeholder="completar con el link a la noticia" value="<? echo $link; ?>">
						</div>
						<hr>
						<div class="form-group">
							<label for="title">Images</label>
							<span class="btn btn-success fileinput-button">
								<i class="fa fa-plus"></i>
								<span>Seleccionar imágenes...</span>
								<!-- The file input field used as target for the file upload widget -->
								<input id="fileupload" type="file" name="">
							</span>
							<br>
							<br>
							<!-- The global progress bar -->
							<p class="infobubbles bg-info text-info"><span><i class="fa fa-info-circle"></i> Importante: Marcar una imagen como cover para utilizar en el listado de productos.</span></p>
							<div id="progress" class="progress">
								<div class="progress-bar progress-bar-success"></div>
							</div>
							<!-- The container for the uploaded files -->
							<div id="files" class="files" style="display:block;">
								<?php foreach ($imagesdecoded as $image) { ?>
									<div class="uploadedImage col-md-2" style="text-align:center;">
										<img class="img-thumbnail" src="<? echo $image; ?>" alt="loading..."/>
										<a class="deleteimg" href="#">
											delete
											<span>
												<i class="fa fa-trash-o"></i>
											</span>
										</a>
										<label>Cover</label>
										<input <? if($covernum==$cover) echo 'checked'?> class="check" type="radio" name="cover" value="<?php echo $covernum;?>">
									</div>
								<?php
								$covernum = $covernum+1; }
								?>
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
				$('#date').kalendar();
				cover = <?php echo $cover; ?>;
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
						});
					},
					progress: function(e, data){
						var progress = parseInt(data.loaded / data.total * 100, 10);
						$('#prog').text(progress + "%");
						$('.progbar').css('width', progress + "%");
					}
				}).prop('disabled', !$.support.fileInput).parent().addClass($.support.fileInput ? undefined : 'disabled');
				
				$('.deleteimg').click(function(event){
					event.preventDefault();
					$(this).parents('.uploadedImage').remove();
				});
				$('.check').click(function(event){
					cover = $(this).parents('.uploadedImage').index();
		  		});

				$('#save').click(function(event){
					event.preventDefault();

					// guardo las variables para enviar
					var idNews = $('#product').attr('idNews');
					//ESP
					var title = $('#title').val();
					var body = $('#body').val();
					//ENG
					var title2 = $('#title2').val();
					var body2 = $('#body2').val();
					//POR
					var title3 = $('#title3').val();
					var body3 = $('#body3').val();
					var date = $('#date').val();
					var link = $('#link').val();
					imgarr = [];
			    	$('.uploadedImage').each(function(index, value){
				      imgarr.push($(this).find('img').attr('src'));
					});
					var images = JSON.stringify(imgarr);
					var orderby = $('#orderby').val();

					// validar campos
					error = [];
					if (!title) { error.push('Es obligatorio completar el título en español'); }
					if (!body) { error.push('\n\rEs obligatorio completar el cuerpo en español'); }
					if (!title2) { error.push('\n\rEs obligatorio completar el título en inglés'); }
					if (!body2) { error.push('\n\rEs obligatorio completar el cuerpo en inglés'); }
					if (!title3) { error.push('\n\rEs obligatorio completar el título en portugués'); }
					if (!body3) { error.push('\n\rEs obligatorio completar el cuerpo en portugués'); }
					if (!date) { error.push('\n\rEs obligatorio completar la fecha'); }
					if (!link) { error.push('\n\rEs obligatorio completar el link'); }
					if (error.length > 0) {
						alert(error);
						return false;
					}

					// envio las variables por Ajax
					$.ajax({
						type: "POST",
						url: "save.php",
						cache: false,
						data: {idNews:idNews, title:title, body:body, title2:title2, body2:body2, title3:title3, body3:body3, date:date, link:link, images:images, cover:cover, orderby:orderby},
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








