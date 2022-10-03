

<?php
echo"<br>";
    use App\Helpers\Sessao;
    Sessao::mensagem('erro');
?>

<link href="<?=URL?>public/css/styles.css" rel="stylesheet" />
        
   
  
        <div id="layoutError">
            <div id="layoutError_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="text-center mt-4">
                                    <img class="mb-4 img-error" src="<?=URL?>public/img/error-404-monochrome.svg" />
                                    <p class="lead">Esta Url não foi encontrada no nosso servidor</p>
                                    <a id="error" href="<?=URL?>home" style="color: #ddd;  ">
                                        Returne para Home
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutError_footer">
                
            </div>
        </div>
        
        <script src="<?=URL?>public/js/scripts.js"></script>


