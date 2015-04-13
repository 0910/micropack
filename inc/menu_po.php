<div class="menu">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-9">
                        <a class="logo" href="index.php">
                            <img src="../img/logo.png" alt="MICROPACK"/>
                        </a>
                        <div class="menucaller hidden-lg"><i class="fa fa-bars"></i></div>
                    </div>
                    <div class="col-md-3 lang visible-lg">
                        <a class="sublang" data-toggle="modal" data-target="#langselect" href="#">POR <div class="flag" style="background-image:url(../img/bra.png);"></div> <i class="fa fa-caret-down"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 menuinside">
                <a href="index.php">Home</a>
                <a href="somos.php">Nossa Equipe</a>
                <a href="premios.php">Prêmios</a>
                <a href="novedades.php">Notícias</a>
                <a href="experiencias.php">Experiências</a>
                <a style="padding:0;" href="contacto.php">Contato</a>
                <a class="visible-xs sublang" data-toggle="modal" data-target="#langselect" href="#">PO <i class="fa fa-caret-down"></i></a>
            </div>
        </div>
    </div>
</div>
<div id="langselect" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Selecione o idioma</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <a href="http://micropack.com/ES/">Español
                        <div class="flag" style="background-image:url(../img/arg.png);"></div>
                        </a>
                    </div>
                    <div class="col-md-12">
                        <a href="http://micropack.com/PO/">Português
                        <div class="flag" style="background-image:url(../img/bra.png);"></div>
                        </a>
                    </div>
                    <div class="col-md-12">
                        <a href="http://micropack.com/EN/">English
                        <div class="flag" style="background-image:url(../img/usa.png);"></div>
                        </a>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
    $('.menucaller').click(function(event){
        $('.menuinside').slideToggle();
    });
</script>