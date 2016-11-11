<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Woopi Blog - Login</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/matrix-login.css" />
        <link href="<?= base_url() ?>assets/admin/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    </head>
    <body>
        <div id="loginbox">            
            <form id="loginform" class="form-vertical" method="post" action="<?= base_url() ?>admin/login/iniciarsesion">
                <div class="control-group normal_text"> <h3><img src="<?= base_url() ?>assets/admin/img/logo.png" alt="Logo" /></h3></div>


                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" name="user" placeholder="Usuario" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="password" placeholder="Password" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">No recuerda la contraseña?</a></span>
                    <span class="pull-right"><input type="submit" href="index.html" class="btn btn-success" value="Ingresar"/> </span>
                </div>
            </form>
            <?php if (!empty($mensajeerror)): ?>
                <div class="alert alert-error alert-block">
                    <h4 class="alert-heading">Error!</h4>
                    <?= $mensajeerror ?>
                </div>
            <?php endif; ?>
            <form id="recoverform" action="#" class="form-vertical">
                <p class="normal_text">Ingresa el mail con el que estás registrado en el panel. Se te enviará un emal con una nueva contraseña provisoria.</p>

                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />
                    </div>
                </div>

                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
                    <span class="pull-right"><a class="btn btn-info"/>Reecover</a></span>
                </div>
            </form>
        </div>

        <script src="<?= base_url() ?>assets/admin/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>assets/admin/js/matrix.login.js"></script>
    </body>

</html>
