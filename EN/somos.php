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
                                "The best materials. The best processes, a team of creative and unprecedented design and a higher level in the management of cardboard. <br/>
                                 So we get always (always!) Your cardboard displays are the most functional, the most reliable, the most resistant, the most innovative, the most beautiful ... <br/>
                                 The POP cardboard is always Micropack. "
                            </h3>
                        </div>
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
