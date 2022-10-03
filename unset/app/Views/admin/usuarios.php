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
    <link href="<?= URL ?>public/img/favicon.png" rel="icon">
    <title>Painel Administrativo - Google Glass</title>

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
            <li class="nav-item active">
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
                    <ul class="navbar-nav  ml-auto">

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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['usuarios_nome'] ?> (admin)</span>
                                <img class="img-profile rounded-circle" src="<?=$_SESSION['foto']?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?=URL?>admin/viewprofile" >
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400" ></i>
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

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Usuarios</h1>
                    <p class="mb-4">Senhor(a) administrador(a) <strong><?= $_SESSION['usuarios_nome'] ?></strong> nesta view vais poder ter acesso a lista de todos usuarios cadastrados no seu sistema, você decide se quer eliminar ou cadastrar novos usuarios.!</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Todos Usuarios</h6>
                        </div>
                        <button type="button" class="btn btn-primary mt-3 mb-2 ml-3" style="width: 50px;" data-toggle="modal" data-target="#modelId">
                            +
                        </button>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Nome</th>
                                            <th>Email</th>
                                            <th>Idade</th>
                                            <th>Criado em</th>
                                            <th>Nivel</th>
                                            <th>Acções</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>id</th>
                                            <th>Nome</th>
                                            <th>Email</th>
                                            <th>Idade</th>
                                            <th>Criado em</th>
                                            <th>Nivel</th>
                                            <th>Acções</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php if (isset($dados['usuarios'])):$i=1;?>
                                        <?php foreach ($dados['usuarios'] as $users) : ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?= $users['nome'] ?></td>
                                                <td><?= $users['email'] ?></td>
                                                <td><?= Valida::idade($users['data_nascimento']) ?></td>
                                                <td><?= Valida::ANG($users['criado_em']) ?></td>
                                                <td><?= $users['nivel'] == 0 ? 'normal' : '(admin)' ?></td>
                                                <td>
                                                    <div class="d-flex align-items-center justify-content-between ">
                                                        <a name="cad" href="<?= URL ?>admin/profiles/<?= $users['id'] ?>" class="btn btn-warning ">
                                                        <i class="fas fa-eye"></i>
                                                        </a>
                                                        <form action="<?= URL ?>admin/deleteusers/<?= $users['id'] ?>" method="post">
                                                            <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                            <?php endif;?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                <!-- /.Load pages -->

                <!-- Modal 1-->
                <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Formulario para adicionar novo Usuario</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form method="POST" action="<?= URL ?>admin/createuser">
                                    <div class="form-group">
                                        <label for="nome">Nome</label>
                                        <input type="text" name="nome" id="nome" value="<?= $dados['nome'] ?>" class="form-control <?= $dados['erro_nome'] ? 'is-invalid' : '' ?>">
                                        <div class="invalid-feedback">
                                            <?= $dados['erro_nome'] ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <input type="text" name="email" id="email" value="<?= $dados['email'] ?>" class="form-control <?= $dados['erro_email'] ? 'is-invalid' : '' ?>">
                                        <div class="invalid-feedback">
                                            <?= $dados['erro_email'] ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="senha">Senha</label>
                                        <input type="password" name="senha" id="senha" value="<?= $dados['senha'] ?>" class="form-control <?= $dados['erro_senha'] ? 'is-invalid' : '' ?>">
                                        <div class="invalid-feedback">
                                            <?= $dados['erro_senha'] ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="data">Data de nasc</label>
                                        <input type="date" name="data" id="data" value="<?= $dados['data'] ?>" class="form-control <?= $dados['erro_data'] ? 'is-invalid' : '' ?> ">
                                        <div class="invalid-feedback">
                                            <?= $dados['erro_data'] ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" id="adm" name="adm">
                                        <label for="adm">Adicionar como administrador</label>
                                    </div>
                                    <button type="submit" class="btn btn-success col-12" name="cad" value="cadastrar">Cadastrar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal 2 -->
                <div class="modal fade" id="modelprofile" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Perfil</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                

                            </div>
                        </div>
                    </div>
                </div>

            </div>
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