<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Sistema de ventas para Mypes" />
        <meta name="author" content="Ricky Salazar" />
        <title>Sistema de Venta</title>
        <link href="<?php echo base_url; ?>Assets/css/styles.css" rel="stylesheet" />
        <link href="<?php echo base_url; ?>Assets/css/my-style.css" rel="stylesheet" />
        <script src="<?php echo base_url; ?>Assets/js/all.js" crossorigin="anonymous"></script>
    </head>

    <body class="bg-light">
        <div class="row">
            <div class="col-md-4">
                <div class="img-portada">
                    <img src="./Assets/img/pizza_peperoni.jpg" alt="">
                </div>
            </div>
            <div class="col-md-8">
                <div>
                    <div id="layoutAuthentication" class="w-100">
                    <div id="layoutAuthentication_content">
                        <main class="login">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-5">
                                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                                            <div class="card-header d-flex justify-content-center"><img src="./Assets/img/Logo.jpg" alt=""></div>
                                            <div class="card-body">
                                                <form id="frmLogin">
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="usuario" type="text" name="usuario" />
                                                        <label for="usuario"><i class="fas fa-user"></i> Usuario</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="clave" name="clave" type="password" />
                                                        <label for="clave"><i class="fas fa-key"></i> Contraseña</label>
                                                    </div>
                                                    <div class="alert alert-danger text-center d-none" id="alerta" role="alert">
        
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                                        <button class="btn btn-success" type="submit" onclick="frmLogin(event);">Ingresar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </main>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo base_url; ?>Assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url; ?>Assets/js/scripts.js"></script>
        <script>
            const base_url = "<?php echo base_url; ?>";
        </script>
        <script src="<?php echo base_url; ?>Assets/js/login.js"></script>
    </body>
</html>
