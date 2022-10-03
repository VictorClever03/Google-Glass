<?php

use App\Helpers\Sessao;
use App\Helpers\Valida;


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Painel Administrativo - Google Glass</title>
    <link href="<?= URL ?>public/img/favicon.png" rel="icon">
    <!-- Custom fonts for this template-->
    <link href="<?= URL ?>public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= URL ?>public/css/css/sb-admin-2.min.css" rel="stylesheet">

    <link href="<?= URL ?>public/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= URL ?>admin/home">
                <div class="sidebar-brand-icon rotate-n-15">
                    <!-- <i class="fas fa-laugh-wink"></i> -->
                </div>
                <div class="sidebar-brand-text mx-3">GooGle Glass</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link" href="<?= URL ?>admin/home">
                    <i class="fas fa-th-list fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Paginas
            </div>

            <!-- Nav Item -->
            <li class="nav-item">
                <a href="<?= URL ?>admin/createuser" class="nav-link" href="#">
                    <i class="fas fa-tachometer-alt fa-users"></i>
                    <span>Usuarios</span>
                </a>
            </li>

            <!-- Nav Item -->
            <li class="nav-item">
                <a href="<?= URL ?>admin/pedidos" class="nav-link" href="#">
                    <i class="fas fa-fw fa-list-alt"></i>
                    <span>Solicitações</span>
                </a>
            </li>

            <!-- Nav Item -->
            <li class="nav-item">
                <a href="<?= URL ?>admin/postes" class="nav-link" href="#">
                    <i class="fas fa-fw fa-clipboard-list"></i>
                    <span>Postagens</span>
                </a>
            </li>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-dark" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$_SESSION['usuarios_nome']?> (admin)</span>
                                <img class="img-profile rounded-circle" src="<?=$_SESSION['foto']?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= URL ?>admin/viewprofile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= URL ?>admin/logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Sair
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Load pages -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?= Sessao::sms('erroupload')?>
                    <?= Sessao::sms('sucessoupload')?>
                    <?= Sessao::sms('sms')?>
                    <h1 class="h3 mb-2 text-gray-800">Perfil</h1>

                    <section class="section profile">
                        <div class="row">
                            <div class="col-xl-4">

                                <div class="card">
                                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                                        <img src="<?=$_SESSION['foto']?>" alt="Profile" width="150px" class="rounded-circle">
                                        <h2><?=$dados['nome']?></h2>
                                        <h3><small> <?=$dados['trabalho']?></small></h3>
                                        <div class="social-links mt-2">

                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-xl-8">

                                <div class="card">
                                    <div class="card-body pt-3">
                                        <!-- Bordered Tabs -->
                                        <ul class="nav nav-tabs nav-tabs-bordered">

                                            <li class="nav-item">
                                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Ver</button>
                                            </li>

                                            <li class="nav-item">
                                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editar</button>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" href="<?=URL?>admin/changepassword" >Mudar a Password</a>
                                            </li>

                                        </ul>
                                        <div class="tab-content pt-2">

                                            <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                                <h5 class="card-title">Biografia</h5>
                                                <p class="small fst-italic"><?=$dados['about']?></p>
                                                <h5 class="card-title">Detalhes de perfil</h5>

                                                <div class="row">
                                                    <div class="col-lg-3 col-md-4 label">Nome</div>
                                                    <div class="col-lg-9 col-md-8"><?=$dados['nome']?></div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-3 col-md-4 label">Trabalho</div>
                                                    <div class="col-lg-9 col-md-8"><?=$dados['trabalho']?></div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-3 col-md-4 label">Endreço</div>
                                                    <div class="col-lg-9 col-md-8"><?=$dados['endereco']?></div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-3 col-md-4 label">Contacto</div>
                                                    <div class="col-lg-9 col-md-8"><?=$dados['contacto']?></div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                                    <div class="col-lg-9 col-md-8"><?=$dados['email']?></div>
                                                </div>

                                            </div>

                                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                                <!-- Profile Edit Form -->
                                                <form action="<?=URL?>admin/viewprofile" method="post">
                                                    <div class="row mb-3">
                                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Imagem de Perfil</label>
                                                        <div class="col-md-8 col-lg-9">
                                                            <img src="<?=$_SESSION['foto']?>" alt="Profile" class="rounded-circle" width="150px">
                                                            <div class="pt-2" >

                                                                <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#upload" title="Upload nova foto"><i class="fas fa-upload"></i></a>
                                                                <a href="<?=URL?>admin/deletefoto" class="btn btn-danger btn-sm" title="delete minha foto"><i class="fas fa-trash"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label for="nome" class=" col-md-4 col-lg-3 col-form-label ">Nome</label>
                                                        <div class="col-md-8 col-lg-9 ">
                                                            <input name="nome" type="text" class="form-control <?= $dados['err_nome']?'is-invalid':'' ;?>" id="nome" value="<?=$dados['nome']?>">
                                                            <div class="invalid-feedback">
                                                                <?=$dados['err_nome']?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label for="about" class="col-md-4 col-lg-3 col-form-label ">Biografia</label>
                                                        <div class="col-md-8 col-lg-9">
                                                            <textarea name="about" class="form-control <?= $dados['err_about']?'is-invalid':''; ?>" id="about" style="height: 100px"><?=$dados['about']?></textarea>
                                                            <div class="invalid-feedback">
                                                                <?=$dados['err_about']?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label for="trabalho" class="col-md-4 col-lg-3 col-form-label ">Trabalho</label>
                                                        <div class="col-md-8 col-lg-9">
                                                            <input name="trabalho" type="text" class="form-control <?= $dados['err_trabalho']?'is-invalid':''; ?>" id="trabalho" value="<?=$dados['trabalho']?>">
                                                            <div class="invalid-feedback">
                                                                <?=$dados['err_trabalho']?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label for="endereco" class="col-md-4 col-lg-3 col-form-label ">Endereço</label>
                                                        <div class="col-md-8 col-lg-9">
                                                            <input name="endereco" type="text" class="form-control <?= $dados['err_endereco']?'is-invalid':''; ?>" id="endereco" value="<?=$dados['endereco']?>">
                                                            <div class="invalid-feedback">
                                                                <?=$dados['err_endereco']?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label ">Contacto</label>
                                                        <div class="col-md-8 col-lg-9">
                                                            <input name="contacto" type="text" class="form-control <?= $dados['err_contacto']?'is-invalid':''; ?>" id="Phone" value="<?=$dados['contacto']?>">
                                                            <div class="invalid-feedback">
                                                                <?=$dados['err_contacto']?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label for="email" class="col-md-4 col-lg-3 col-form-label ">Email</label>
                                                        <div class="col-md-8 col-lg-9">
                                                            <input name="email" type="email" class="form-control <?= $dados['err_email']?'is-invalid':''; ?>" id="eamil" value="<?=$dados['email']?>">
                                                            <div class="invalid-feedback">
                                                                <?=$dados['err_email']?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="text-center">
                                                        <button type="submit" name="cad" value="s" class="btn btn-primary">Salvar</button>
                                                    </div>
                                                </form><!-- End Profile Edit Form -->

                                            </div>

                                           

                                        </div><!-- End Bordered Tabs -->

                                    </div>
                                </div>

                            </div>

                        </div>
                    </section>

                </div>

                <div class="modal fade" id="upload" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Carregar Uma Foto</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form method="post" action="<?=URL?>admin/viewprofile" enctype="multipart/form-data">
                                    <input type="file" name="upload" id="upload">
                                    <input type="submit" value="submeter">
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <br><br>

                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Google Glass 2022</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Bootstrap core JavaScript-->
        <script src="<?= URL ?>public/vendor/jquery/jquery.min.js"></script>
        <script src="<?= URL ?>public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?= URL ?>public/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?= URL ?>public/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="<?= URL ?>public/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= URL ?>public/vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="<?= URL ?>public/js/datatables-demo.js"></script>

        <script src="<?= URL ?>public/js/bootstrap.bundle.min.js"></script>


</body>

</html>


<!--  -->