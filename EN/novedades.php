<?php
    // iniciamos session
    session_start();

    // archivos necesarios
    require_once '../admin/includes/config.php';
    require_once '../admin/includes/conexion.php';

    // obtengo puntero de conexion con la db
    $dbConn = conectar();

    // carga registros
    $arrNews = array();
    $query = "SELECT idNews, title, title2, title3, images, cover, date, orderby FROM news ORDER BY date DESC";
    $resultado = mysql_query($query, $dbConn);
    while ($row = mysql_fetch_assoc($resultado)){
    array_push($arrNews,$row);
    }
    foreach ($arrNews as $News) {
    $idNews = $News['idNews'];
    $date = date('j F Y', strtotime($News['date']));
    $title = stripslashes($News['title2']);
    $images = $News['images'];
    $cover = $News['cover'];
    $imagesdecoded = json_decode($images);
    $bufferNews .= '<div class="col-md-3 col-sm-6 item newsitem product spacer">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="image" style="background-image:url('. $imagesdecoded[$cover] .');"></div>
                                <a href="noticia.php?idNews='. $idNews .'" rel="'. $idNews .'">
                                    <h2>
                                        '. $title .'
                                    </h2>
                                    <p>'. $date .'</p>
                                    <div class="viewmore"></div>
                                </a>
                            </div>
                        </div>
                    </div>';
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("../inc/head.php"); ?>
  </head>
  <body>
    <?php include("../inc/menu_en.php"); ?>
    <div class="container">
        <div class="row" style="margin:0;">
            <div class="row" id="loader"></div>
        </div>
    	<div id="novedades" class="row">
            <?php echo $bufferNews; ?>
    	</div>
        <?php include("../inc/footer_en.php"); ?>
    </div><!-- /.container -->
    <script type="text/javascript">
        $(function(){
            $('.newsitem a').click(function(event){
                event.preventDefault();
                idNews = $(this).attr('rel');
                $('#loader').slideUp(300, function(){
                    $(window).scrollTop(200);
                    $.ajax({
                        type: "GET",
                        url: 'noticia.php',
                        data: { idNews:idNews },
                        success: function(datos){
                            $("#loader").html(datos);
                            $('#loader').slideDown(500, function(){
                                $(window).scrollTop(0);
                            });
                        }
                    });
                });
            });
        });
    </script>
  </body>
</html>
