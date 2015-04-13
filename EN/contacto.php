<?php
    // iniciamos session
    session_start();

    // archivos necesarios
    require_once '../admin/includes/config.php';
    require_once '../admin/includes/conexion.php';

    // obtengo puntero de conexion con la db
    $dbConn = conectar();

    // carga registros
    $arrOffices = array();
    $query = "SELECT idOffices, title, body, image, orderby FROM offices ORDER BY orderby DESC";
    $resultado = mysql_query($query, $dbConn);
    while ($row = mysql_fetch_assoc($resultado)){
    array_push($arrOffices,$row);
    }
    foreach ($arrOffices as $Offices) {
    $idOffices = $Offices['idOffices'];
    $title = stripslashes($Offices['title']);
    $body = stripslashes(nl2br($Offices['body']));
    $image = $Offices['image'];
    $bufferOffices .= '<div class="office">
                        <img src="'. $image .'" alt=""/>
                        <h2>'. $title .'</h2>
                        <p>'. $body .'</p>
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
    	<div id="contactform" class="row">
            <div class="col-md-6 col-sm-6">
                <div class="row">
                    <div class="col-md-12">
                        <?php echo $bufferOffices; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="row">
                    <div class="col-md-12">
                        <h2>
                            Contact Form
                        </h2>
                        <form method="POST" action="submitform.php" id="contact-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input id="name" class="form-control" name="name" type="text" value="" placeholder="Name" required/>
                                    </div>
                                    <div class="form-group">
                                        <input id="email" class="form-control" name="email" type="text" value="" placeholder="E-Mail" required/>
                                    </div>
                                    <div class="form-group">
                                        <input id="cargo" class="form-control" name="cargo" type="text" value="" placeholder="Position" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input id="phone" class="form-control" name="phone" type="text" value="" placeholder="Phone" required/>
                                    </div>
                                    <div class="form-group">
                                        <input id="empresa" class="form-control" name="empresa" type="text" value="" placeholder="Business" required/>
                                    </div>
                                    <div class="form-group">
                                        <input id="consulta" class="form-control" name="consulta" type="text" value="" placeholder="Query Type" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group contactbox">
                                        <textarea style="width:100%; height:100px;" id="message" class="form-control" name="message" type="text" placeholder="Mensaje"></textarea>
                                    </div>
                                    <div class="form-group" style="float:right;">
                                        <button style="margin-top:5px;" class="btn btn-grey">Send</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    	</div>
        <?php include("../inc/footer_en.php"); ?>
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
                        url: 'noticia.php',
                        //data: { idProduct:idProduct },
                        success: function(datos){
                            $("#loader").html(datos);
                            $('#loader').slideDown(500, function(){});
                        }
                    });
                });
            });
        });
    </script>
  </body>
</html>
