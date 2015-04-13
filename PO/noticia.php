<?php
	// iniciamos session
	session_start();

	// archivos necesarios
	require_once '../admin/includes/config.php';
	require_once '../admin/includes/conexion.php';
	
	// obtengo puntero de conexion con la db
	$dbConn = conectar();

	if (!empty($_GET['idNews'])) {
		$query = "SELECT idNews, date, title3, body3, link, images, cover FROM news WHERE idNews = {$_GET['idNews']}";
		$resultado = mysql_query($query, $dbConn) or die(mysql_error());
		$row = mysql_fetch_assoc($resultado);
		$idNews = $row['idNews'];
		$title = stripslashes($row['title3']);
		$body = stripslashes(nl2br($row['body3']));
		$images = $row['images'];
	    $cover = $row['cover'];
	    $imagesdecoded = json_decode($images);
	}
?>
<div class="row">
	<div class="col-md-12">
		<h1>
			<?php echo $title ?><a class="close" href="#"><i class="fa fa-times"></i></a>
		</h1>
	</div>
	<div id="slider" class="col-md-12">
		<? foreach ($imagesdecoded as $image) {?>
			<div class="photo" rel="photos" style="background-image:url(<? echo($image); ?>); display:none;"></div>
		<? } ?>
        <a class="prevphoto" href="#"><i class="fa fa-chevron-left"></i></a>
		<a class="nextphoto" href="#"><i class="fa fa-chevron-right"></i></a>
		<div class="steps"></div>
	</div>
	<div class="col-md-12">
        <p>
        	<?php echo $body; ?>
		</p>
		<a class="via" href="#" target="_blank"><?php echo $link; ?></a>
	</div>
</div>
<script type="text/javascript">
	$(function(){
		$('.close').click(function(event){
			$('#loader').slideUp(500).html('');
		});
		/* Slider */

		photoTot = $('.photo').size();
		if (photoTot > 1){ $('.steps, .prevphoto, .nextphoto').fadeIn(); }
		$('.photo').each(function(){
	    	$('.steps').append('<div class="step"></div>');
	    });
		photoTot--;
		photoCnt = 0;
	    // select the first
	    $('.photo').eq(0).show();
		$('.steps .step').eq(0).css('opacity', 1);
	
		// event bind
		$('.step').click(function(event){
			event.preventDefault();
			photoCnt = $(this).index();
			$('.photo').hide();
			$('.photo').eq(photoCnt).fadeIn(800);
			$('.step').css('opacity', '0.5');
			$('.step').eq(photoCnt).css('opacity', '1');
		});
		$('.prevphoto').click(function(event){
			event.preventDefault();
			if (photoCnt >= 1){
				$('.photo').hide();
				photoCnt--;
				$('.photo').eq(photoCnt).fadeIn(800);
				$('.step').css('opacity', '0.5');
				$('.step').eq(photoCnt).css('opacity', '1');
			}
			else if(photoCnt == 0){
				$('.photo').hide();
				photoCnt = photoTot;
				$('.photo').eq(photoTot).fadeIn(800);
				$('.step').css('opacity', '0.5');
				$('.step').eq(photoCnt).css('opacity', '1');
			}
		});
		$('.nextphoto').click(function(event){
			event.preventDefault();
			if (photoCnt < photoTot){
				$('.photo').hide();
				photoCnt++;
				$('.photo').eq(photoCnt).fadeIn(800);
				$('.step').css('opacity', '0.5');
				$('.step').eq(photoCnt).css('opacity', '1');
			}
			else if(photoCnt == photoTot){
				$('.photo').hide();
				photoCnt = 0;
				$('.photo').eq(photoCnt).fadeIn(800);
				$('.step').css('opacity', '0.5');
				$('.step').eq(photoCnt).css('opacity', '1');
			}
		});
	});
</script>