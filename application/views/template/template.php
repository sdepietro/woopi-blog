<!DOCTYPE html>
<html lang="es">
    <?php $this->load->view('template/header'); ?>

    <body>

        <!--Header-part-->
        <div id="header">
            <h1><a href="dashboard.html">Woopi Blog - Admin Template</a></h1>
        </div>
        <!--close-Header-part--> 
        <!--top-Header-menu-->

        <?php $this->load->view('template/botonerasuperior'); ?>
        <!--close-top-Header-menu-->
        <!--start-top-serch-->
        <!--        <div id="search">
                    <input type="text" placeholder="Search here..."/>
                    <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
                </div>-->
        <!--close-top-serch-->
        <!--sidebar-menu-->
        <?php $this->load->view('template/botoneraizquierda'); ?>

        <!--sidebar-menu-->

        <!--main-container-part-->
        <div id="content">
            <?php $this->load->view($main_content); //en esta variable voy a cargar la otra vista que quiero que cargue. ej: login ?>
        </div>

        <!--end-main-container-part-->

        <?php $this->load->view('template/footer'); ?>

    </body>
</html>