<!DOCTYPE html>
<html lang="es">
    <?php $this->load->view('admin/template/header'); ?>

    <body>

        <!--Header-part-->
        <div id="header">
            <h1><a href="dashboard.html">Woopi Blog - Admin Template</a></h1>
        </div>
        <!--close-Header-part--> 
        <!--top-Header-menu-->

        <?php $this->load->view('admin/template/botonerasuperior'); ?>
        <!--close-top-Header-menu-->
        <!--start-top-serch-->
        <!--        <div id="search">
                    <input type="text" placeholder="Search here..."/>
                    <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
                </div>-->
        <!--close-top-serch-->
        <!--sidebar-menu-->
        <?php $this->load->view('admin/template/botoneraizquierda'); ?>

        <!--sidebar-menu-->

        <!--main-container-part-->
        <div id="content">
            <?php $this->load->view($main_content); //en esta variable voy a cargar la otra vista que quiero que cargue. ej: login ?>
        </div>

        <!--end-main-container-part-->

        <?php $this->load->view('admin/template/footer'); ?>


        <!-- CONTENIDO EN LIGHTBOX QUE SE UTILIZA PARA SOBREEESCRIBIR MENSAJES, ALERTAS, ETC. -->
        <div class="modal fade" id="popup-eliminar">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 id="formulario-titulo" class="modal-title">Modal Default</h4>
                    </div>
                    <div class="modal-body">
                        <p id="formulario-mensaje">One fine body&hellip;</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                        <a id="btn-eliminar" href="#" class="btn btn-danger">Eliminar</a>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </body>
</html>