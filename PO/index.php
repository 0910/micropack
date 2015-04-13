<?php
    // iniciamos session
    session_start();

    // archivos necesarios
    require_once '../admin/includes/config.php';
    require_once '../admin/includes/conexion.php';

    // obtengo puntero de conexion con la db
    $dbConn = conectar();

    // carga quotes
    $arrQuotes = array();
    $query = "SELECT idQuotes, body, body2, body3, orderby FROM quotes ORDER BY orderby DESC";
    $resultado = mysql_query($query, $dbConn);
    while ($row = mysql_fetch_assoc($resultado)){
        array_push($arrQuotes,$row);
    }
    foreach ($arrQuotes as $Quotes) {
    $idQuotes = $Quotes['idQuotes'];
    $body = $Quotes['body3'];
    $bufferQuotes .= '<div class="quote">
                            <h1>'. $body .'</h1>
                      </div>';
    }
    // carga ultima noticia
    $arrNews = array();
    $queryNews = "SELECT idNews, title3, date, images, orderby FROM news ORDER BY date DESC LIMIT 1 ";
    $resultadoNews = mysql_query($queryNews, $dbConn) or die(mysql_error());
    while ($rowNews = mysql_fetch_assoc($resultadoNews)){
        array_push($arrNews, $rowNews);
    }
    foreach ($arrNews as $News) {
        $newsbody = stripslashes($News['title3']);
        $day = date('d', strtotime($News['date']));
        $month = date('F', strtotime($News['date']));
        $year = date('Y', strtotime($News['date']));
        $meses = array("January" => "Janeiro","February"  => "Fevereiro","March" => "Março","April" => "Abril","May" => "Maio","June" => "Junho","Julho" => "Julio","August" => "Agosto","September" => "Setembro","October" => "Outubro","November" => "Novembro","December" => "Dezembro");
        $esp_month = str_replace(array_keys($meses), array_values($meses), $month);
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("../inc/head.php"); ?>
  </head>
  <body>
    <?php include("../inc/menu_po.php"); ?>
    <div class="container">
    	<div class="row">
            <div class="cycle-slideshow visible-lg"
            data-cycle-fx="scrollHorz" 
            data-cycle-timeout="9000"
            data-cycle-slides="> div.prodslide"
            >
                <div class="prodslide">
                    <div class="col-md-3 col-sm-6 item product">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="experiencias.php?cat=mega">
                                    <img class="lazy" data-original="../img/exhibidores/mega-exhibidor.png" alt="Rack, Papelão Display, materiais de publicidade, pop, embalagens."/>
                                    <p>Mega Displays</p>
                                    <div class="viewmore"></div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 item product">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="experiencias.php?cat=botaderos">
                                    <img class="lazy" data-original="../img/exhibidores/exhibidor-botadero.png" alt="Rack, Papelão Display, materiais de publicidade, pop, embalagens."/>
                                    <p>Cestos</p>
                                    <div class="viewmore"></div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 item product">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="experiencias.php?cat=depie">
                                    <img class="lazy" data-original="../img/exhibidores/exhibidor-de-pie.png" alt="Rack, Papelão Display, materiais de publicidade, pop, embalagens."/>
                                    <p>Displays de Chão</p>
                                    <div class="viewmore"></div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 item product">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="experiencias.php?cat=pallet">
                                    <img class="lazy" data-original="../img/exhibidores/exhibidor-boxpallet.png" alt="Rack, Papelão Display, materiais de publicidade, pop, embalagens."/>
                                    <p>Boxpallet®</p>
                                    <div class="viewmore"></div>
                                </a>
                            </div>
                        </div>
                    </div>    
                </div>
                <div class="prodslide">             
                    <div class="col-md-3 col-sm-6 item product">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="experiencias.php?cat=islas">
                                    <img class="lazy" data-original="../img/exhibidores/exhibidor-isla.png" alt="Rack, Papelão Display, materiais de publicidade, pop, embalagens."/>
                                    <p>Ilhas</p>
                                    <div class="viewmore"></div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 item product">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="experiencias.php?cat=mostrador">
                                    <img class="lazy" data-original="../img/exhibidores/exhibidor-de-mostrador.png" alt="Rack, Papelão Display, materiais de publicidade, pop, embalagens."/>
                                    <p>Displays de balcão</p>
                                    <div class="viewmore"></div>
                                </a>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-3 col-sm-6 item product">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="experiencias.php?cat=automaticos">
                                    <img class="lazy" data-original="../img/exhibidores/display-de-armado-automatico.png" alt="Rack, Papelão Display, materiais de publicidade, pop, embalagens."/>
                                    <p>Displays automáticos</p>
                                    <div class="viewmore"></div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 item product">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="experiencias.php?cat=packaging">
                                    <img class="lazy" data-original="../img/exhibidores/packaging.png" alt="Rack, Papelão Display, materiais de publicidade, pop, embalagens."/>
                                    <p>Packaging</p>
                                    <div class="viewmore"></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CATEGORIAS MOBILE -->

            <div class="categories hidden-lg">
                <div class="col-md-3 col-sm-6 item product">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="experiencias.php?cat=mega">
                                <img class="lazy" data-original="../img/exhibidores/mega-exhibidor.png" alt="Rack, Papelão Display, materiais de publicidade, pop, embalagens."/>
                                <p>Mega Displays</p>
                                <div class="viewmore"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 item product">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="experiencias.php?cat=botaderos">
                                <img class="lazy" data-original="../img/exhibidores/exhibidor-botadero.png" alt="Rack, Papelão Display, materiais de publicidade, pop, embalagens."/>
                                <p>Cestos</p>
                                <div class="viewmore"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 item product">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="experiencias.php?cat=depie">
                                <img class="lazy" data-original="../img/exhibidores/exhibidor-de-pie.png" alt="Rack, Papelão Display, materiais de publicidade, pop, embalagens."/>
                                <p>Displays de Chão</p>
                                <div class="viewmore"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 item product">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="experiencias.php?cat=pallet">
                                <img class="lazy" data-original="../img/exhibidores/exhibidor-boxpallet.png" alt="Rack, Papelão Display, materiais de publicidade, pop, embalagens."/>
                                <p>Boxpallet®</p>
                                <div class="viewmore"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 item product">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="experiencias.php?cat=islas">
                                <img class="lazy" data-original="../img/exhibidores/exhibidor-isla.png" alt="Rack, Papelão Display, materiais de publicidade, pop, embalagens."/>
                                <p>Ilhas</p>
                                <div class="viewmore"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 item product">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="experiencias.php?cat=mostrador">
                                <img class="lazy" data-original="../img/exhibidores/exhibidor-de-mostrador.png" alt="Rack, Papelão Display, materiais de publicidade, pop, embalagens."/>
                                <p>Displays de balcão</p>
                                <div class="viewmore"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 item product">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="experiencias.php?cat=automaticos">
                                <img class="lazy" data-original="../img/exhibidores/display-de-armado-automatico.png" alt="Rack, Papelão Display, materiais de publicidade, pop, embalagens."/>
                                <p>Displays automáticos</p>
                                <div class="viewmore"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 item product">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="experiencias.php?cat=packaging">
                                <img class="lazy" data-original="../img/exhibidores/packaging.png" alt="Rack, Papelão Display, materiais de publicidade, pop, embalagens."/>
                                <p>Packaging</p>
                                <div class="viewmore"></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    	</div>
    	<div class="row spacer">
    		<div class="col-md-3 col-sm-6 item">
                <div class="row">
                    <div class="col-md-12">
                        <? foreach ($arrNews as $news) { ?>
                            <div class="news">
                                <h2>Novedades</h2>
                                <p>
                                    <?php echo $newsbody; ?>
                                </p>
                                <div class="date">

                                    <h2><?php echo $esp_month; ?><span><? echo $year; ?></span></h2>
                                    <h1><?php echo $day; ?></h1>
                                    <a href="novedades.php">Ver mais notícias</a>
                                </div>
                            </div>
                        <? } ?>
                    </div>
                </div>
    		</div>
    		<div class="col-md-9 col-sm-6">
                <div class="row">
        			<div class="col-md-8 col-sm-12 grid">
        				<a class="team" href="somos.php">
    	    				<p>Nossa Equipe</p>
                            <div class="viewmore"></div>
    	    			</a>
        			</div>
        			<div class="col-md-4 col-sm-12 item product">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="experiencias.php?cat=modushelf">
                                    <img class="lazy" data-original="../img/exhibidores/modushelf.png" alt="Rack, Papelão Display, materiais de publicidade, pop, embalagens."/>
                                    <p>ModuShelf®</p>
                                    <div class="viewmore"></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row spacer visible-lg">
        			<div class="col-md-4 col-sm-6 item product">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="#">
                                    <img class="lazy" data-original="../img/prices.png" alt="Rack, Papelão Display, materiais de publicidade, pop, embalagens."/>
                                    <p>Prêmios</p>
                                    <div class="viewmore"></div>
                                </a>
                            </div>
                        </div>
                    </div>
        			<div class="col-md-8 grid">
        				<div class="quotes magenta">
                            <div class="cycle-slideshow" 
                                data-cycle-fx="scrollHorz" 
                                data-cycle-timeout="5000"
                                data-cycle-slides="> div.quote"
                                >
                                <?php echo $bufferQuotes; ?>
                            </div>
    	    			</div>
        			</div>
                </div>
    		</div>
        </div>
        <div class="row hidden-lg">
                <div class="col-md-4 col-sm-6 item product">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="#">
                                <img class="lazy" data-original="../img/prices.png" alt="Rack, Papelão Display, materiais de publicidade, pop, embalagens."/>
                                <p>Prêmios</p>
                                <div class="viewmore"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-6 grid">
                    <div class="quotes magenta">
                        <div class="cycle-slideshow" 
                            data-cycle-fx="scrollHorz" 
                            data-cycle-timeout="5000"
                            data-cycle-slides="> div.quote"
                            >
                            <?php echo $bufferQuotes; ?>
                        </div>
                    </div>
                </div>
    	</div>
        <?php include("../inc/footer_po.php"); ?>
    </div><!-- /.container -->
    <script type="text/javascript">
        $(function(){
            $('img.lazy').lazyload({
                effect : "fadeIn"
            });
        });
    </script>
  </body>
</html>
