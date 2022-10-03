<?php

use App\Helpers\Sessao;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Painel Admin</title>
        <link rel="stylesheet" type="text/css" href="<?=URL?>public/css/_css/estilo.css">
        <link href="<?=URL?>public/css/styles1.css" rel="stylesheet" />
        <link href="<?= URL ?>public/img/favicon.png" rel="icon">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-dark">
 
        <div  id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                    
                                        <form method="Post" action="<?=URL?>admin/login">
                                       
                                            <?=Sessao::sms('usuario')?>
                                        
                                            <div class="form-floating mb-3">
                                                <input class="form-control <?=$dados['erro_email']?'is-invalid':'' ?>" value="<?=$dados['email']?>" id="inputEmail" type="email" placeholder="name@example.com" name="email" />
                                                <label for="inputEmail">Email address</label>
                                                <div class="invalid-feedback">
                                                    <?=$dados['erro_email']?>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control <?=$dados['erro_senha']?'is-invalid':''?>" id="inputPassword" type="password" placeholder="Password" value="<?=$dados['senha']?>" name="senha"/>
                                                <label for="inputPassword">Password</label>
                                                <div class="invalid-feedback">
                                                    <?=$dados['erro_senha']?>
                                                </div>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-end mt-4 mb-0">
                                                
                                               <button style="border: none; outline:none; background:none;" type="submit" name="log" value="login"><a class="btn btn-secondary">Login</a></button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small">Victor Clever</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Google Glass 2021</div>
                            <div>
                                <a href="<?=URL?>home">Sair</a>
                                &middot;
                                <a href="#"></a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
       
        <script src="<?=URL?>public/js/scripts.js"></script>
    </body>
</html>

        
    
