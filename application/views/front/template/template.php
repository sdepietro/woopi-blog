<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('front/template/header'); ?>
    <body>
        <!-- Navigation -->
        <?php $this->load->view('front/template/menu'); ?>
        <!-- Page Content -->
        <div class="container">
            <div class="row">
                <!-- Entradas del blog -->
                <div class="col-md-8">
                    <?php $this->load->view($main_content);  ?>
                </div>
                <!-- Columna de filtros -->
                <div class="col-md-4">
                    <?php $this->load->view('front/template/filters'); ?>
                </div>
            </div>
            <hr>
            <?php $this->load->view('front/template/footer'); ?>
        </div>
        <!-- /.container -->
    </body>
</html>