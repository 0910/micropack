<?php
    // iniciamos session
    session_start();

    // archivos necesarios
    require_once '../admin/includes/config.php';
    require_once '../admin/includes/conexion.php';

    // obtengo puntero de conexion con la db
    $dbConn = conectar();

    // carga registros
    $arrProducts = array();
    $query = "SELECT idProduct, title, images, cover, category, orderby FROM products WHERE price = '1' ORDER BY orderby DESC";
    $resultado = mysql_query($query, $dbConn);
    while ($row = mysql_fetch_assoc($resultado)){
    array_push($arrProducts,$row);
    }
    foreach ($arrProducts as $Products) {
        $idProduct = $Products['idProduct'];
        $title = stripslashes($Products['title']);
        $category = $Products['category'];
        $images = $Products['images'];
        $cover = $Products['cover'];
        $imagesdecoded = json_decode($images);
        $bufferProducts .= '<div class="col-md-3 col-sm-6 item product spacer mix '. $category .'">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="detaller.php?idProduct='. $idProduct .'" rel="'. $idProduct .'">
                                            <img src="'. $imagesdecoded[$cover] .'" alt="'. $title .'" description="Exhibidor, Exhibidores de carton, material publicitario, pop, packaging."/>
                                            <p>'. $title .'</p>
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
    <?php include("../inc/menu.php"); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row filters">
                    <div class="row">
                        <div class="col-md-3 filter" data-filter=".mega">
                            <div class="filterbox">
                                <a href="#">Mega Exhibidores</a>
                            </div>
                        </div>
                        <div class="col-md-3 filter" data-filter=".arcos">
                            <div class="filterbox">
                                <a href="#">Botaderos</a>
                            </div>
                        </div>
                        <div class="col-md-3 filter" data-filter=".depie">
                            <div class="filterbox">
                                <a href="#">Exhibidores de pie</a>
                            </div>
                        </div>
                        <div class="col-md-3 filter" data-filter=".displays">
                            <div class="filterbox">
                                <a href="#">Box Pallet®</a>
                            </div>
                        </div>
                        <div class="col-md-3 filter" data-filter=".islas">
                            <div class="filterbox">
                                <a href="#">Islas</a>
                            </div>
                        </div>
                        <div class="col-md-3 filter" data-filter=".botaderos">
                            <div class="filterbox">
                                <a href="#">Exhibidores de Mostrador</a>
                            </div>
                        </div>
                        <div class="col-md-3 filter" data-filter=".automaticos">
                            <div class="filterbox">
                                <a href="#">Displays automáticos</a>
                            </div>
                        </div>
                        <div class="col-md-3 filter" data-filter=".packaging">
                            <div class="filterbox">
                                <a href="#">Packaging</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row exp_loader" id="loader"></div>
            </div>
        </div>
        <div class="row">
            <div id="experiencias">
                <?php echo $bufferProducts; ?>
            </div>
        </div>
        <?php include("../inc/footer.php"); ?>
    </div><!-- /.container -->
    <script type="text/javascript">
        $(function(){
            $('#experiencias').mixItUp({
                animation: {
                    duration: 600,
                    effects: 'fade',
                    easing: 'ease'
                }
            });
            $('.product a').click(function(event){
                event.preventDefault();
                idProduct = $(this).attr('rel');
                $('#loader').slideUp(300, function(){
                    $(window).scrollTop(200);
                    $.ajax({
                        type: "GET",
                        url: 'detalle.php',
                        data: { idProduct:idProduct },
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
