<?php
	// iniciamos session
	session_start();

	// archivos necesarios
	require_once '../../includes/config.php';
	require_once '../../includes/conexion.php';
	require_once '../../includes/esUsuario.php';
		
	include("../../inc/inc_checkuser.php");

	if (empty($_GET['idProduct'])) {
		header("Location: index.php");
	}
	if (!empty($_GET['idProduct'])) {
		$query = "SELECT idProduct, title, client, description, title2, client2, description2, title3, client3, description3, images, cover, price, category, orderby FROM products WHERE idProduct = {$_GET['idProduct']}";
		$resultado = mysql_query($query, $dbConn) or die(mysql_error());
		$row = mysql_fetch_assoc($resultado);
		$idProduct = $row['idProduct'];
		$title = stripslashes($row['title']);
		$client = stripslashes($row['client']);
		$description = stripslashes($row['description']);
		$title2 = stripslashes($row['title2']);
		$client2 = stripslashes($row['client2']);
		$description2 = stripslashes($row['description2']);
		$title3 = stripslashes($row['title3']);
		$client3 = stripslashes($row['client3']);
		$description3 = stripslashes($row['description3']);
		$images = $row['images'];
		$imagesdecoded = json_decode($images);
		$cover = $row['cover'];
		$price = $row['price'];
		$category = $row['category'];
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
				Editar producto: <? echo $title; ?>
				<span>
					<a href="index.php"class="goback">
						<i class="fa fa-chevron-left"></i> volver
					</a>
				</span>
			</h2>
			<hr>
			<div id="product" class="row" idProduct="<? echo $idProduct; ?>">
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
									<label for="title">Cliente</label>
									<input type="text" class="form-control" name="client" id="client" placeholder="completar con el nombre del cliente" value="<? echo $client; ?>">
								</div>
								<hr>
								<div class="form-group">
									<label for="title">Nombre</label>
									<input type="text" class="form-control" name="title" id="title" placeholder="completar con el nombre del producto" value="<? echo $title; ?>">
								</div>
								<hr>
								<div class="form-group">
									<label for="description">Descripción</label>
									<textarea rows="10" type="text" class="form-control" name="description" id="description" placeholder="completar con la descripción del producto"><?php echo $description; ?></textarea>
								</div>
							</div>
							<!-- ENG -->
							<div role="tabpanel" class="tab-pane fade" id="eng">
								<div class="form-group">
									<label for="title">Cliente</label>
									<input type="text" class="form-control" name="client2" id="client2" placeholder="completar con el nombre del cliente" value="<? echo $client2; ?>">
								</div>
								<hr>
								<div class="form-group">
									<label for="title">Nombre</label>
									<input type="text" class="form-control" name="title2" id="title2" placeholder="completar con el nombre del producto" value="<? echo $title2; ?>">
								</div>
								<hr>
								<div class="form-group">
									<label for="description">Descripción</label>
									<textarea rows="10" type="text" class="form-control" name="description2" id="description2" placeholder="completar con la descripción del producto"><?php echo $description2; ?></textarea>
								</div>
							</div>
							<!-- POR -->
							<div role="tabpanel" class="tab-pane fade" id="por">
								<div class="form-group">
									<label for="title">Cliente</label>
									<input type="text" class="form-control" name="client3" id="client3" placeholder="completar con el nombre del cliente" value="<? echo $client3; ?>">
								</div>
								<hr>
								<div class="form-group">
									<label for="title">Nombre</label>
									<input type="text" class="form-control" name="title3" id="title3" placeholder="completar con el nombre del producto" value="<? echo $title3; ?>">
								</div>
								<hr>
								<div class="form-group">
									<label for="description">Descripción</label>
									<textarea rows="10" type="text" class="form-control" name="description3" id="description3" placeholder="completar con la descripción del producto"><?php echo $description3; ?></textarea>
								</div>
							</div>
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
							<label>Categoría</label>
							<select id="category" name="category">
								<option <? if($category=='mega') echo 'selected="selected"'?> value="mega">Mega Exhibidores</option>
								<option <? if($category=='botaderos') echo 'selected="selected"'?> value="botaderos">Botaderos</option>
								<option <? if($category=='depie') echo 'selected="selected"'?> value="depie">Exhibidores de Pié</option>
								<option <? if($category=='pallet') echo 'selected="selected"'?> value="pallet">Box Pallet®</option>
								<option <? if($category=='islas') echo 'selected="selected"'?> value="islas">Islas</option>
								<option <? if($category=='mostrador') echo 'selected="selected"'?> value="mostrador">Exhibidores de Mostrador</option>
								<option <? if($category=='automaticos') echo 'selected="selected"'?> value="automaticos">Displays Automáticos</option>
								<option <? if($category=='packaging') echo 'selected="selected"'?> value="packaging">Packaging</option>
								<option <? if($category=='modushelf') echo 'selected="selected"'?> value="modushelf">ModuShelf®</option>
							</select>
						</div>
						<hr>
						<div class="form-group">
							<label>Premio</label>
							<select id="price" name="price">
								<option <? if($price=='0') echo 'selected="selected"'?> value="0">NO</option>
								<option <? if($price=='1') echo 'selected="selected"'?> value="1">SI</option>
							</select>
						</div>
						<hr>
						<div class="form-group">
							<label for="price">Order by</label>
							<p class="infobubbles bg-info text-info"><span><i class="fa fa-info-circle"></i> Serán ordenados en forma DESCENDENTE segun el número asignado</span></p>
							<input type="text" class="form-control" name="orderby" id="orderby" placeholder="complete with product order" value="<? echo $orderby; ?>">
						</div>
						<hr>
						<div class="form-group">
							<div class="col-md-4 col-md-offset-4">
								<div class="col-md-6"><button id="save" class="btn btn-lg btn-success btn-block" type="submit">update</button></div>
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
					var idProduct = $('#product').attr('idProduct');
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
						url: "save.php",
						cache: false,
						data: {idProduct:idProduct, client:client, title:title, description:description, client2:client2, title2:title2, description2:description2, client3:client3, title3:title3, description3:description3, images:images, cover:cover, orderby:orderby, price:price, category:category},
						error: function(obj, msg, obj2) { console.log(msg); },
						complete: function(){
							window.location = 'index.php?createdmsg=Cambios guardados!';
						}
					});
					return false;
				});
			});
		</script>









