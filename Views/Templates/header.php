<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Panel de administración</title>
        <link href="<?php echo base_url; ?>Assets/css/style.css" rel="stylesheet" />
        <link href="<?php echo base_url; ?>Assets/css/styles.css" rel="stylesheet" />
        <link href="<?php echo base_url; ?>Assets/DataTables/datatables.min.css" rel="stylesheet" crossorigin="anonymous"/>
        <link href="<?php echo base_url; ?>Assets/css/my-style.css" rel="stylesheet" />
        <link href="<?php echo base_url; ?>Assets/css/bootstrap-horizon.css" rel="stylesheet" />
        <script src="<?php echo base_url; ?>Assets/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-success">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">POS VENTA</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 text-white" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Perfil</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href=" <?php echo base_url; ?>Usuarios/salir ">Cerrar sesion</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark bg-success" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon text-white"><i class="fas fa-tools"></i></div>
                                 Configuracion
                                <div class="sb-sidenav-collapse-arrow text-white"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link text-white" href="<?php echo base_url; ?>Usuarios"><i class="fas fa-user me-2"></i>Usuarios</a>
                                    <a class="nav-link text-white" href="<?php echo base_url; ?>Cajas"><i class="fas fa-cash-register me-2"></i>Cajas</a>
                                    <a class="nav-link text-white" href="<?php echo base_url; ?>Administracion"><i class="fas fa-tools me-2"></i>Administración</a>
                                    <a class="nav-link text-white" href="<?php echo base_url; ?>Clientes"><i class="fas fa-users me-2"></i>Clientes</a>
                                    <a class="nav-link text-white" href="<?php echo base_url; ?>Medidas"><i class="fas fa-scale-balanced me-2"></i>Medidas</a>
                                    <a class="nav-link text-white" href="<?php echo base_url; ?>Categorias"><i class="fas fa-box-open me-2"></i>Categorias</a>
                                    <a class="nav-link text-white" href="<?php echo base_url; ?>Productos"><i class="fab fa-product-hunt me-2"></i>Productos</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCompras" aria-expanded="false" aria-controls="collapseCompras">
                                <div class="sb-nav-link-icon text-white"><i class="fab fa-product-hunt"></i></div>
                                 Gastos
                                <div class="sb-sidenav-collapse-arrow text-white"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseCompras" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link text-white" href="<?php echo base_url; ?>Gastos"><i class="fas fa-shopping-cart me-2"></i>Nuevo Gasto</a>
                                    <a class="nav-link text-white" href="<?php echo base_url; ?>Gastos/historial"><i class="fas fa-list me-2"></i>Historial Gastos</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse" data-bs-target="#collapseVentas" aria-expanded="false" aria-controls="collapseVentas">
                                <div class="sb-nav-link-icon text-white"><i class="fab fa-product-hunt"></i></div>
                                 Ventas
                                <div class="sb-sidenav-collapse-arrow text-white"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseVentas" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link text-white" href="<?php echo base_url; ?>Ventas"><i class="fas fa-shopping-cart me-2"></i>Nueva Venta</a>
                                    <a class="nav-link text-white" href="<?php echo base_url; ?>Ventas/historial_ventas"><i class="fas fa-list me-2"></i>Historial Ventas</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content" class="bg-success">
                <main>
                    <div class="container-fluid px-4 mt-2">
