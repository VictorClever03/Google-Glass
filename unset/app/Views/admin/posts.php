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
            <li class="nav-item active">
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
                                <a class="dropdown-item" href="<?=URL?>admin/viewprofile">
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

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Posts</h1>
                    <p class="mb-4">Senhor(a) administrador(a) <strong><?= $_SESSION['usuarios_nome'] ?></strong> nesta view vais poder ter acesso a lista de todos posts feitos por usuarios logados no seu sistema, você decide se quer eliminar ou cadastrar novo post.!</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Todos Posts</h6>
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
                                            <th>Usuario</th>
                                            <th>Titulo</th>
                                            <th>Criado em</th>
                                            <th>Acções</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>

                                            <th>id</th>
                                            <th>Usuario</th>
                                            <th>Titulo</th>
                                            <th>Criado em</th>
                                            <th>Acções</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php if (isset($dados['posts'])): $i=1;?>
                                        <?php foreach ($dados['posts'] as $posts) : ?>
                                            <tr>
                                                
                                                <td><?= $i++ ?></td>
                                                <td><?= $posts['nome'] ?></td>
                                                <td><?= $posts['titulo'] ?></td>
                                                <td><?= Valida::ANG($posts['dataposts']) ?></td>

                                                <td>
                                                    <div class="d-flex align-items-center ">
                                                        <a name="cad" href="<?= URL ?>admin/viewpost/<?= $posts['idposts'] ?>" class="btn btn-warning mr-3">
                                                        <i class="fas fa-eye"></i>
                                                        </a>
                                                        <form action="<?= URL ?>admin/deleteposts/<?= $posts['idposts'] ?>" method="post">
                                                            <button class="btn btn-danger ml-3"><i class="fas fa-trash"></i></button>
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
                                <h5 class="modal-title">Novo Post</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form method="POST" action="<?= URL ?>admin/postes">
                                    <div class="form-group">
                                        <label for="nome">titulo</label>
                                        <input type="text" name="titulo" id="nome" value="<?= $dados['titulo'] ?>" class="form-control <?= $dados['erro_titulo'] ? 'is-invalid' : '' ?>">
                                        <div class="invalid-feedback">
                                            <?= $dados['erro_titulo'] ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="mensagem">Mensagem</label>
                                        <!-- <input type="text" name="mensagem" id="mensagem" value="<= $dados['mensagem'] ?>" class="form-control <= $dados['erro_mensagem'] ? 'is-invalid' : '' ?>"> -->
                                        <textarea class="form-control <?= $dados['erro_mensagem'] ? 'is-invalid' : '' ?>" name="mensagem" id="mensagem" rows="5"><?= $dados['mensagem'] ?></textarea>
                                        <div class="invalid-feedback">
                                            <?= $dados['erro_mensagem'] ?>
                                        </div>
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

                                <section class="section">
                                    <div class="card">
                                        <div class="card-body">
                                            <nav>
                                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                    <button class="nav-link active" id="nav-aluno-tab" data-bs-toggle="tab" data-bs-target="#nav-aluno" type="button" role="tab" aria-controls="nav-aluno" aria-selected="true">Estudante</button>
                                                    <button class="nav-link" id="nav-curso-tab" data-bs-toggle="tab" data-bs-target="#nav-curso" type="button" role="tab" aria-controls="nav-curso" aria-selected="false">Cursos</button>
                                                    <button class="nav-link" id="nav-empresa-tab" data-bs-toggle="tab" data-bs-target="#nav-empresa" type="button" role="tab" aria-controls="nav-empresa" aria-selected="false">Empresas</button>
                                                </div>
                                            </nav>
                                            <div class="tab-content" id="nav-tabContent">
                                                <div class="tab-pane fade show active" id="nav-aluno" role="tabpanel" aria-labelledby="nav-aluno-tab">


                                                    <form class="row g-3 needs-validation" novalidate method="post">

                                                        <legend><br> Dados Pessoais</legend>
                                                        <div class="col-md-4">
                                                            <label for="nome_aluno" class="form-label">Estudante</label>
                                                            <input type="text" class="form-control" id="nome_aluno" name="nome_aluno" placeholder="Nome do Estudante" required>
                                                            <div class="invalid-feedback">
                                                                Preencha o Campo
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="nome_encarregado" class="form-label">Encarregado de Educação</label>
                                                            <input type="text" class="form-control" id="nome_encarregado" name="nome_encarregado" placeholder="Nome do Encarregado" required>
                                                            <div class="invalid-feedback">
                                                                Preencha o Campo
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="data_nascimento" class="form-label">Data de Nascimento</label>

                                                            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
                                                            <div class="invalid-feedback">
                                                                Preencha o Campo

                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <label for="residencia" class="form-label">Residência</label>
                                                            <input type="text" class="form-control" id="residencia" name="residencia" placeholder="Residência" required>
                                                            <div class="invalid-feedback">
                                                                Preencha o Campo
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="email" class="form-label">Email</label>
                                                            <div class="input-group has-validation">
                                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                                <input type="text" class="form-control" id="email" name="email" aria-describedby="inputGroupPrepend" required>
                                                                <div class="invalid-feedback">
                                                                    Preencha o Campo
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <label for="contacto" class="form-label">Phone</label>
                                                            <div class="input-group has-validation">
                                                                <span class="input-group-text" id="inputGroupPrepend">+244</span>
                                                                <input type="text" class="form-control" id="contacto" name="contacto" required>
                                                                <div class="invalid-feedback">
                                                                    Preencha o Campo
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <label for="sexo1"> Sexo:</label>
                                                        <div class="form-check ms-4">
                                                            <input class="form-check-input" type="radio" name="sexo" id="sexo1" value="M" required checked>
                                                            <div class="invalid-feedback">
                                                                Preencha o Campo
                                                            </div>
                                                            <label class="form-check-label" for="sexo1">
                                                                Masculino
                                                            </label>
                                                        </div>
                                                        <div class="form-check ms-4">
                                                            <input class="form-check-input" type="radio" name="sexo" id="sexo2" value="F" required>
                                                            <div class="invalid-feedback">
                                                                Preencha o Campo
                                                            </div>
                                                            <label class="form-check-label" for="sexo2">
                                                                Femenino
                                                            </label>
                                                        </div>

                                                        <div class="col-12">
                                                            <button class="btn btn-primary" type="submit">Salvar</button>
                                                        </div>

                                                    </form>





                                                </div>
                                                <div class="tab-pane fade" id="nav-curso" role="tabpanel" aria-labelledby="nav-curso-tab">


                                                    <form class="row g-3 needs-validation" novalidate method="post">

                                                        <legend><br> Curso</legend>
                                                        <div class="col-md-4">
                                                            <label for="nome_curso" class="form-label">Nome do Curso</label>
                                                            <input type="text" class="form-control" id="nome_curso" name="nome_curso" placeholder="Nome do Curso" required>
                                                            <div class="invalid-feedback">
                                                                Preencha o Campo
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="desc_curso" class="form-label">Descrição</label>
                                                            <input type="text" class="form-control" id="desc_curso" name="desc_curso" placeholder="Descreva o Curso" required>
                                                            <div class="invalid-feedback">
                                                                Preencha o Campo
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <button class="btn btn-primary" type="submit">Salvar</button>
                                                        </div>
                                                    </form>


                                                </div>
                                                <div class="tab-pane fade" id="nav-empresa" role="tabpanel" aria-labelledby="nav-empresa-tab">



                                                    <form class="row g-3 needs-validation" novalidate method="post">

                                                        <legend><br> Empresa</legend>
                                                        <div class="col-md-4">
                                                            <label for="nome_empresa" class="form-label">Nome Da Empresa</label>
                                                            <input type="text" class="form-control" id="nome_empresa" name="nome_empresa" placeholder="Nome da Empresa" required>
                                                            <div class="invalid-feedback">
                                                                Preencha o Campo
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="actividade_empresa" class="form-label">Actividade</label>
                                                            <input type="text" class="form-control" id="actividade_empresa" name="actividade_empresa" placeholder="Actividade da Empresa" required>
                                                            <div class="invalid-feedback">
                                                                Preencha o Campo
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="email_empresa" class="form-label">Email</label>
                                                            <div class="input-group has-validation">
                                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                                <input type="text" class="form-control" id="email_empresa" name="email_empresa" aria-describedby="inputGroupPrepend" required>
                                                                <div class="invalid-feedback">
                                                                    Preencha o Campo
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <label for="contacto_empresa" class="form-label">Phone</label>
                                                            <div class="input-group has-validation">
                                                                <span class="input-group-text" id="inputGroupPrepend">+244</span>
                                                                <input type="text" class="form-control" id="contacto_empresa" name="contacto_empresa" required>
                                                                <div class="invalid-feedback">
                                                                    Preencha o Campo
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <button class="btn btn-primary" type="submit">Salvar</button>
                                                        </div>
                                                    </form>

                                                </div>
                                               



                                                
                                            </div>
                                        </div>
                                    </div>
                                </section>

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