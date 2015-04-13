<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("../inc/head.php"); ?>
  </head>
  <body>
    <?php include("../inc/menu_po.php"); ?>
    <div class="container">
    	<div id="contactform" class="row">
            <div class="col-md-6 col-sm-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="cycle-slideshow" 
                            data-cycle-fx="scrollHorz" 
                            data-cycle-timeout="5000"
                            data-cycle-slides="> div.team_inside"
                            >
                            <div class="team_inside" style="background-image:url(../img/team/micropack-equipo-01.jpg);"></div>
                            <div class="team_inside" style="background-image:url(../img/team/micropack-equipo-02.jpg);"></div>
                            <div class="team_inside" style="background-image:url(../img/team/micropack-equipo-03.jpg);"></div>
                            <div class="team_inside" style="background-image:url(../img/team/micropack-equipo-06.jpg);"></div>
                            <div class="team_inside" style="background-image:url(../img/team/micropack-equipo-07.jpg);"></div>
                            <div class="team_inside" style="background-image:url(../img/team/micropack-equipo-08.jpg);"></div>
                            <div class="team_inside" style="background-image:url(../img/team/micropack-equipo-09.jpg);"></div>
                            <div class="team_inside" style="background-image:url(../img/team/micropack-equipo-10.jpg);"></div>
                            <div class="team_inside" style="background-image:url(../img/team/micropack-equipo-11.jpg);"></div>
                            <div class="team_inside" style="background-image:url(../img/team/micropack-equipo-12.jpg);"></div>
                            <div class="team_inside" style="background-image:url(../img/team/micropack-equipo-13.jpg);"></div>
                            <div class="team_inside" style="background-image:url(../img/team/micropack-equipo-14.jpg);"></div>
                            <div class="team_inside" style="background-image:url(../img/team/micropack-equipo-15.jpg);"></div>
                            <div class="team_inside" style="background-image:url(../img/team/micropack-equipo-16.jpg);"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="quotes green">
                            <h3>
                                "Os melhores materiais, os melhores processos, uma equipe de design criativa, sem precedentes e um nível superior na gestão de projetos. 
                                Então, nós temos sempre (sempre!) a solução mais funcional,  mais confiável, mais resistente, mais inovadora e mais bela ... 
                                O Papelão POP é sempre Micropack.”
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
    	</div>
        <?php include("../inc/footer_po.php"); ?>
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
