<?
// include the configs / constants for the database connection
require_once("classes/Login.php");
/*include_once("include/utiles.inc.php");*/
// load the login class
// create a login object. when this object is created, it will do all login/logout stuff automatically
// so this single line handles the entire login process. in consequence, you can simply ...
$login = new Login();

if ($login->isUserLoggedIn() == true) {
    // the user is logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are logged in" view.
    header("location: /casos/buscador");
} else {
    // the user is not logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are not logged in" view.
    $ubicacion = "LOGIN";
    include ('include/header.inc.php');
    ?>
    <body>
        <?
        include ('include/navbar.inc.php');
        ?>

        <div class="container" style="margin-top:30px">
            <div class="row justify-content-center">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card card-signin my-5">
                        <div class="card-body">
                            <h5 class="card-title text-center">Login</h5>
                            <form method="post" accept-charset="utf-8" action="/casos/login" name="loginform" autocomplete="off" role="form" class="form-signin">
                                
                                <div class="form-label-group">
                                    <input type="text" id="user_name" name="user_name" type="text" value="" class="form-control" placeholder="Usuario" required autofocus>
                                </div>

                                <div class="form-label-group">
                                    <input type="password" id="user_password" class="form-control" placeholder="Contraseña" name="user_password" type="password" value="" autocomplete="off" maxlength="16" required>
                                </div>
                                
                                <?/*reCaptcha V2 (Configurar con claves del sitio una vez online)*/
                                /*<div class="form-label-group text-center" style="margin-bottom:.5rem;">
                                    <div class=" g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div> <? /* SECRET KEY 6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe */ /*?>
                                </div>*/?>
                                <?php
                                // show potential errors / feedback (from login object)
                                if (isset($login)) {
                                    if ($login->errors) {
                                        ?>
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <strong>Error!</strong> 

                                            <?php
                                            foreach ($login->errors as $error) {
                                                echo $error;
                                            }
                                            ?>
                                        </div>
                                        <?php
                                    }
                                    if ($login->messages) {
                                        ?>
                                        <div class="alert alert-success alert-dismissible" role="alert">
                                            <strong>Aviso!</strong>
                                            <?php
                                            foreach ($login->messages as $message) {
                                                echo $message;
                                            }
                                            ?>
                                        </div> 
                                        <?php
                                    }
                                }
                                ?>
                                

                                <button class="btn btn-lg btn-block btn-custom" style="margin-bottom:1rem;" type="submit" name="login" id="submit">Iniciar Sesión</button>
                                
                                
                                

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>




        <script src="<?= $hostactual ?>js/jquery-3.4.1.min.js"></script>
        <script src="<?= $hostactual ?>js/popper1.14.7.min.js"></script>
        <script src="<?= $hostactual ?>js/bootstrap.js"></script>

    </body>
    </html>

    <?php

