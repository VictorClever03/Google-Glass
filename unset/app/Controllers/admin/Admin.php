<?php

namespace App\Controllers\admin;

use App\Controllers\admin\paginas;
use App\Helpers\Sessao;
use App\Helpers\Url;
use App\Libraries\Controller;
use App\Helpers\Valida;
use App\Libraries\Uploads;
use LDAP\Result;

class Admin extends Controller
{
    private $Data;
    private $readupload;

    public function __construct()
    {
        $this->Data = $this->model("admin\Usuarios");

        if (!Sessao::restrito()) :
            session_destroy();
            Url::redireciona('home');
        endif;
        $this->readupload = $this->Data->readupload($_SESSION['usuarios_id']);
        $_SESSION['foto']= URL.$this->readupload['path']??URL.'public/img/undraw_profile_2.svg';
    }
    // metodo principal
    public function index()
    {
        Url::redireciona('admin/login');
    }
    // metodo para realizar o login 
    public function login()
    {
        if (!Sessao::restrict()) :
            Url::redireciona('admin/home');
        endif;
        $formulario = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        //   var_dump($formulario);
        if (isset($formulario['log'])) :
            $dado = [
                'email' => trim($formulario['email']),
                'senha' => trim($formulario['senha']),
                'erro_email' => '',
                'erro_senha' => ''
            ];

            if (in_array("", $formulario)) :

                if (empty($formulario['email'])) :
                    $dado['erro_email'] = "preencha o campo email";
                endif;

                if (empty($formulario['senha'])) :
                    $dado['erro_senha'] = "preencha o campo senha";
                endif;

            else :
                if (Valida::email($formulario['email'])) :
                    $dado['erro_email'] = "preencha corretamente o email";
                else :
                    $checarlogin = $this->Data->checalogin($dado['email'], $dado['senha'], 1);
                    if ($checarlogin) :
                        Sessao::sms('usuarios', 'Login realizado com sucesso');
                        Url::redireciona('Admin/home');
                        $this->criarsessao($checarlogin);
                        var_dump($_SESSION);
                    // echo"funciona";

                    else :
                        Sessao::sms('usuario', 'Dados Invalidos', 'alert alert-danger');
                        $dado['erro_email'] = "Dados inválidos";
                        $dado['erro_senha'] = "Dados inválidos";
                    endif;

                // var_dump($formulario);
                endif;

            endif;
        else :
            $dado = [
                'email' => '',
                'senha' => '',
                'erro_email' => '',
                'erro_senha' => ''
            ];
        endif;

        $this->view("admin/login", $dado);
    }


    // metodo para criar a sessao 
    private function  criarsessao($usuario)
    {
        

        $_SESSION['usuarios_id'] = $usuario['id'];
        $_SESSION['usuarios_nome'] = $usuario['nome'];
        $_SESSION['usuarios_email'] = $usuario['email'];
        $_SESSION['usuarios_nivel'] = $usuario['nivel'];
    }

    // metodo para terminar sessao
    public function logout()
    {
        unset($_SESSION['usuario_id']);
        unset($_SESSION['usuario_nome']);
        unset($_SESSION['usuario_email']);
        session_destroy();
        Url::redireciona('Admin/login');
    }

    // metodo para carregar a view home
    public function home()
    {

        if (Sessao::restrict()) :
            Url::redireciona('home');
        endif;



        if ($this->Data->totalusers()) :
            $total = [
                'users' => $this->Data->totalusers(),
                'posts' => $this->Data->totalPosts(),
                'pedidos' => $this->Data->totalPedido(),
                'pedidosA' => $this->Data->totalA()
            ];
        else :
            die("erro");
        endif;
        $this->view("admin/home", $total);
    }

    // metodo para cadastrar novo usuario
    public function createuser()
    {
        if (Sessao::restrict()) :
            Url::redireciona('home');
        endif;

        $formulario = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        // var_dump($formulario);
        $admin = isset($formulario['adm']) ? 1 : 0;
        if (isset($formulario['cad'])) :
            $dados = [
                'nome' => trim($formulario['nome']),
                'email' => trim($formulario['email']),
                'senha' => trim($formulario['senha']),
                'data' => trim($formulario['data']),
                'admin' => trim($admin),
                'usuarios' => $this->Data->usuariosRead(),
                'erro_nome' => '',
                'erro_senha' => '',
                'erro_email' => '',
                'erro_c_senha' => '',
                'erro_data' => ''
            ];
            $dados['admin'] ? 1 : 0;
            if (in_array("", $formulario)) :

                if (empty($formulario['nome'])) :
                    $dados['erro_nome'] = "preencha o campo nome";
                endif;

                if (empty($formulario['email'])) :
                    $dados['erro_email'] = "preencha o campo email";
                endif;

                if (empty($formulario['senha'])) :
                    $dados['erro_senha'] = "preencha o campo senha";
                endif;

                if (empty($formulario['data'])) :
                    $dados['erro_data'] = "preencha o campo data de nascimento";
                endif;

            else :
                if (Valida::email($formulario['email'])) :
                    $dados['erro_email'] = "preencha corretamente o email";

                elseif ($this->Data->checaemail($formulario['email'])) :
                    $dados['erro_email'] = "Email já cadastrado";

                elseif (Valida::senhatamanho($formulario['senha'])) :
                    $dados['erro_senha'] = "preencha no máximo 8 digitos";

                else :


                    $dados['senha'] = Valida::pass_segura($formulario['senha']);
                    $cadastrar = $this->Data->armazena($dados);
                    $cadastrarf = $this->Data->storeupload();
                    $cadastrarp = $this->Data->storeperfil();
                    if ($cadastrar) :
                        if ($cadastrarf And $cadastrarp) :
                            Sessao::sms('cad', 'Cadastrado com sucesso');
                            Url::redireciona('admin/home');
                        else :
                            die(Sessao::sms('usuario', 'Erro com banco de dados', 'alert alert-danger'));
                        endif;
                    else :
                        die(Sessao::sms('usuario', 'Erro com banco de dados', 'alert alert-danger'));
                    endif;
                // echo "ok {$dados['admin']}";

                endif;

            endif;
        // var_dump($formulario);
        else :
            $dados = [
                'usuarios' => $this->Data->usuariosRead(),
                'nome' => '',
                'email' => '',
                'senha' => '',
                'data' => '',
                'admin' => '',
                'erro_nome' => '',
                'erro_email' => '',
                'erro_senha' => '',
                'erro_data' => ''
            ];
        endif;


        $this->view("admin/usuarios", $dados);
    }

    // metodo para deletar usaurios
    public function deleteusers($id)
    {
        if (Sessao::restrict()) :
            Url::redireciona('home');
        endif;
        $id = filter_var($id, FILTER_VALIDATE_INT);

        $metodo = filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_DEFAULT);

        if ($id and $metodo == 'POST') :
            if ($this->Data->deletar($id)) :
                Sessao::sms('cad', 'usuario deletado com sucesso');
                Url::redireciona('admin/home');

            else :
                die("Erro com banco de dados, consulte um programador!");
            endif;
        else :
            die("Erro com banco de dados, consulte um programador!");

        endif;
    }

    // metodo para posts
    public function postes()
    {
        if (Sessao::restrict()) :
            Url::redireciona('home');
        endif;
        

        $formulario = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        // var_dump($formulario);

        if (isset($formulario['cad'])) :
            $dados = [
                'titulo' => trim($formulario['titulo']),
                'mensagem' => trim($formulario['mensagem']),
                'posts' => $this->Data->postsRead(),
                'erro_nome' => '',
                'id' => $_SESSION['usuarios_id'],
                'erro_mensagem' => ''
            ];
            if (in_array("", $formulario)) :

                if (empty($formulario['titulo'])) :
                    $dados['erro_titulo'] = "preencha o campo titulo";
                endif;

                if (empty($formulario['mensagem'])) :
                    $dados['erro_mensagem'] = "preencha o campo post";
                endif;

            else :


                $cadastrar = $this->Data->armazenapost($dados);
                if ($cadastrar) :
                    Sessao::sms('cad', 'Cadastrado com sucesso');
                    Url::redireciona('admin/home');
                else :
                    die(Sessao::sms('usuario', 'Erro com banco de dados', 'alert alert-danger'));
                endif;
            // echo "ok {$dados['admin']}";


            endif;
        // var_dump($formulario);
        else :
            $dados = [
                'posts' => $this->Data->postsRead(),
                'titulo' => '',
                'mensagem' => '',
                'erro_titulo' => '',
                'erro_mensagem' => ''
            ];
        endif;

        $this->view("admin/posts", $dados);
    }
    // deletar posts
    public function deleteposts($id)
    {
        if (Sessao::restrict()) :
            Url::redireciona('home');
        endif;
        
        $id = filter_var($id, FILTER_VALIDATE_INT);

        $metodo = filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_DEFAULT);

        if ($id and $metodo == 'POST') :
            if ($this->Data->deletarposts($id)) :
                Sessao::sms('cad', 'usuario deletado com sucesso');
                Url::redireciona('admin/home');

            else :
                die("Erro com banco de dados, consulte um programador!");
            endif;
        else :
            die("metodo nao aceite");

        endif;
    }
    // ver posts
    public  function viewpost($id)
    {
        if (Sessao::restrict()) :
            Url::redireciona('home');
        endif;
        
        $post = $this->Data->lerpostcada($id);

        if ($post == null) {
            Url::redireciona('admin/home');
        }
        $dados = [
            'posts' => $post
        ];
        $this->view('admin/viewpost', $dados);
        // var_dump($post); 
    }
    // editar post
    public function editarpost($id)
    {   

        if (Sessao::restrict()) :
            Url::redireciona('home');
        endif;
        $id = filter_var($id, FILTER_VALIDATE_INT);
        $formulario = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        // var_dump($formulario);
        //echo "<br>$id<br>";
        if (isset($formulario['cad'])) :
            $dado = [
                'titulo' => trim($formulario['titulo']),
                'mensagem' => trim($formulario['mensagem']),
                'erro_titulo' => '',
                'erro_mensagem' => '',
                'id' => $id
            ];

            if (in_array("", $formulario)) :

                if (empty($formulario['titulo'])) :
                    $dado['erro_titulo'] = "preencha o campo titulo";
                endif;

                if (empty($formulario['mensagem'])) :
                    $dado['erro_mensagem'] = "preencha o campo mensagem";
                endif;

            else :

                $metodo = filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_DEFAULT);
                if ($id and $metodo == 'POST') :
                    if ($this->Data->actualiza($dado)) :

                        Sessao::sms('cad', 'Post Actualizado com sucesso admin');
                        Url::redireciona('admin/home');
                    else :
                        Sessao::sms('cad', 'Post Nao Actualizado', 'alert alert-danger');
                        Url::redireciona('admin/home');
                    endif;
                endif;


            endif;

        else :
            $post = $this->Data->lerpostcada($id);

            $dado = [
                'titulo' => $post['titulo'],
                'mensagem' => $post['mensagem'],
                'erro_titulo' => '',
                'erro_mensagem' => '',
                'id' => $post['idposts']
            ];
        endif;



        $this->view("admin/edite", $dado);
    }
// Controllers para perfil
    public function viewprofile()
    {
        if (Sessao::restrict()) :
            Url::redireciona('home');
        endif;
        // upload de imagem
        if (isset($_FILES['upload'])) :
            $upload = new Uploads();
            $upload->imagem($_FILES['upload'], 7, $_SESSION['usuarios_email']);
            // var_dump($upload->getexito(),$upload->geterro());
            
            if ($upload->geterro()) :
                Sessao::sms('erroupload', $upload->geterro(), 'alert alert-danger');
            else :
                $up = [
                    'path' => $_SESSION['path'],
                    'id' => $_SESSION['usuarios_id']
                ];
                if ($this->Data->updateupload($up)) :
                    Sessao::sms('sucessoupload', $upload->getexito());
                    Url::redireciona('admin/viewprofile');
                else :
                    die("erro ao armazenar o caminho da foto de perfil");
                endif;
            endif;
            

        endif;
        $formulario = filter_input_array(INPUT_POST, FILTER_DEFAULT);
       
        $readperfil = $this->Data->viewperfil($_SESSION['usuarios_id']);
        if (isset($formulario['cad'])) :
            // var_dump($formulario);
            $dados = [
                'nome' => trim($formulario['nome']),
                'about' => trim($formulario['about']),
                'trabalho' => trim($formulario['trabalho']),
                'endereco' => trim($formulario['endereco']),
                'contacto' => trim($formulario['contacto']),
                'email' => trim($formulario['email']),
                'err_nome' => '',
                // 'upload' => $readupload,
                'perfil' => $readperfil,
                'err_about' => '',
                'id'=>$_SESSION['usuarios_id'],
                'err_trabalho' => '',
                'err_endereco' => '',
                'err_contacto' => '',
                'err_email' => ''

            ];
            if (in_array("", $formulario)) :

                if (empty($formulario['nome'])) :
                    $dados['err_nome'] = 'Preencha o campo Nome*';
                endif;
                if (empty($formulario['contacto'])) :
                    $dados['err_contacto'] = 'Preencha o campo Contacto*';
                endif;
                if (empty($formulario['email'])) :
                    $dados['err_email'] = 'Preencha o campo Email*';
                endif;
                if (empty($formulario['about'])) :
                    $dados['err_about'] = 'Preencha o campo Biografia*';
                endif;
                if (empty($formulario['trabalho'])) :
                    $dados['err_trabalho'] = 'Preencha o campo Trabalho*';
                endif;
                if (empty($formulario['endereco'])) :
                    $dados['err_endereco'] = 'Preencha o campo Endereço*';
                endif;

            else :
                if (Valida::email($formulario['email'])) :
                    $dados['err_email'] = "preencha corretamente o email";
                else :
                    if($this->Data->updateperfil($dados)):
                        Sessao::sms('sms','Perfil actualizado com sucesso');
                    else:
                        Sessao::sms('sms','Erro com a model Usuarios->updateperfil','alert alert-danger');
                    endif;
                endif;

            endif;
        else :
            $dados = [
                'nome' => $readperfil['nome'],
                'about' => $readperfil['biografia'],
                'trabalho' => $readperfil['trabalho'],
                'endereco' => $readperfil['endereco'],
                'contacto' => $readperfil['contacto'],
                'email' => $readperfil['email'],
                'err_nome' => '',
                'err_about' => '',
                'err_trabalho' => '',
                'err_endereco' => '',
                // 'upload' => $readupload,
                'err_contacto' => '',
                'err_email' => ''
            ];
        endif;
        $this->view('admin/userprofile', $dados);
    }

    public function profiles($id)
    {
        if (Sessao::restrict()) :
            Url::redireciona('home');
        endif;
        $perfil = $this->Data->viewperfil($id);
        $foto = $this->Data->readupload($id);

        if ($perfil == null) {
            Url::redireciona('admin/home');
        }elseif($id==$_SESSION['usuarios_id']){
            Url::redireciona('admin/viewprofile');
        }else{
        $dados = [
            'perfil' => $perfil,
            'foto'=>$foto
        ];
        $this->view('admin/profiles', $dados);}
    }
    public function deletefoto()
    {
        if (Sessao::restrict()) :
            Url::redireciona('home');
        endif;
        // $metodo = filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_DEFAULT);
        $dados=['id'=>$_SESSION['usuarios_id'],'path'=>'public/img/undraw_profile_2.svg']   ;
        if($this->Data->deletefotos($dados)):
            Sessao::sms('sms','imagem deletado com sucesso');
            Url::redireciona('admin/viewprofile');
        else: 
            Sessao::sms('sms','imagem não deletado, erro com a Model Usuarios->deletefoto','alert alert-danger');
            Url::redireciona('admin/viewprofile');
        endif;

    }
    public function changepassword()
    {
        if (Sessao::restrict()) :
            Url::redireciona('home');
        endif;
        $senha=$this->Data->usuarioRead($_SESSION['usuarios_id']);
        $formulario=filter_input_array(INPUT_POST,FILTER_DEFAULT);
        if(isset($formulario['cad'])):
            $dados=['senha'=>trim($formulario['password']),
                    'novasenha'=>trim($formulario['newpassword']),
                    'rnovasenha'=>trim($formulario['renewpassword']),
                    'err_senha'=>'',
                    'err_newpass'=>'',
                    'err_renewpass'=>''
                   ];
            if(in_array("",$formulario)):
                if(empty($formulario['password'])):
                    $dados['err_senha']='Preencha o campo*';
                endif;
                if(empty($formulario['newpassword'])):
                    $dados['err_newpass']='Preencha o campo Nova Senha*';
                endif;
                if(empty($formulario['renewpassword'])):
                    $dados['err_renewpass']='Porfavor repita a Nova Senha*';
                endif;
                
            else:
                if(!password_verify($dados['senha'],$senha['senha'])):
                    $dados['err_senha']='Senha errada';
                elseif($formulario['newpassword']!=$formulario['renewpassword']):
                    $dados['err_renewpass']='Senhas diferentes*';
                else:
                    $dados['novasenha']=password_hash(trim($formulario['newpassword']),PASSWORD_DEFAULT);
                    $newpass=$this->Data->newpass($dados,$_SESSION['usuarios_id']);
                    if($newpass):
                        Sessao::sms('cad','Senha actualizado com sucesso');
                        Url::redireciona('admin/home');
                    else:
                        Sessao::sms('sms','Erro com a Model Usuarios->newpass','alert alert-danger');
                        
                    endif;
                endif;
                var_dump($dados);
            endif;
        
        else:
            $dados=['senha'=>'',
                    'novasenha'=>'',
                    'rnovasenha'=>'',
                    'err_senha'=>'',
                    'err_newpass'=>'',
                    'err_renewpass'=>''
                   ];
                endif;
                $this->view('admin/changepassword',$dados);
                
    }
    public function pedidos()
    {
        if (Sessao::restrict()) :
            Url::redireciona('home');
        endif;
        $dado=['pedidos'=>$this->Data->lerpedidos()];

        $this->view('admin/pedidos',$dado);
    }
    public function atender($id)
    {
        $id=filter_var($id,FILTER_VALIDATE_INT);
        if (Sessao::restrict()) :
            Url::redireciona('home');
        endif;
        $dado=['pedidos'=>$this->Data->lerpedidosS()];
        if($id):
            if($this->Data->atendido($id)):
                Sessao::sms('usuarios','Dados salvos');
                Url::redireciona('admin/home');
            else:
                Sessao::sms('usuarios','Erro com a model','alert alert-danger');
                Url::redireciona('admin/home');
            endif;
        else:
            Sessao::sms('usuarios','Dados passados a url são inválidos','alert alert-danger');
            Url::redireciona('admin/home');
        endif;
        $this->view('admin/pedidos',$dado);
    }
    public function atendidos()
    {
    
        if (Sessao::restrict()) :
            Url::redireciona('home');
        endif;
        $dado=['pedidos'=>$this->Data->lerpedidosS()];
       
        $this->view('admin/atendidos',$dado);
    }






































































































    // metodo para editar usuarios
    // public function editeusers($id)
    // {
    //     $id = filter_var($id, FILTER_VALIDATE_INT);
    //     $metodo = filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_DEFAULT);
    //     $formulario = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    //     // var_dump($formulario);
    //     $admin=isset($formulario['adm'])?1:0;
    //     if (isset($formulario['cadd'])) :
    //         $dados = [
    //             'nome' => trim($formulario['nome']),
    //             'email' => trim($formulario['email']),
    //             'senha' => trim($formulario['senha']),
    //             'data' => trim($formulario['data']),
    //             'admin'=> trim($admin),
    //             'user'=>$this->Data->usuarioRead($id),
    //             'erro_nome'=>'',
    //             'erro_senha'=>'',
    //             'erro_email'=>'',
    //             'erro_data'=>''
    //         ];

    //         if (in_array("", $formulario)) :

    //             if (empty($formulario['nome']) ) :
    //                 $dados['erro_nome'] = "preencha o campo nome";
    //             endif;

    //             if (empty($formulario['email']) ) :
    //                 $dados['erro_email'] = "preencha o campo email";
    //             endif;

    //             if (empty($formulario['senha'])) :
    //                 $dados['erro_senha'] = "preencha o campo senha";
    //             endif;

    //             if (empty($formulario['data'])) :
    //                 $dados['erro_data'] = "preencha o campo data de nascimento";
    //             endif;

    //         else :
    //             if (Valida::email($formulario['email'])) :
    //                 $dados['erro_email'] = "preencha corretamente o email";

    //             elseif (Valida::senhatamanho($formulario['senha'])) :
    //                 $dados['erro_senha'] = "preencha no máximo 8 digitos";

    //             else :


    //                 $dados['senha'] = Valida::pass_segura($formulario['senha']);
    //                 $cadastrar=$this->Data->atualiza($dados,$id);
    //                  if ($id and $metodo == 'POST') :
    //                 if ($cadastrar) :
    //                     Sessao::sms('cad','Actualizado com sucesso');
    //                     Url::redireciona('admin/home');
    //                 else :
    //                     die(Sessao::sms('usuario','Erro com banco de dados', 'alert alert-danger'));
    //                 endif;
    //                 else:
    //                     die("O sistema nao aceita metodo Get");
    //                 endif;

    //             endif;

    //         endif;
    //     // var_dump($formulario);
    //     else :
    //        $user=$this->Data->usuarioRead($id);
    //         $dados = [

    //             'nome' => $user['nome'],
    //             'email' => $user['email'],
    //             'senha' => '',
    //             'data' => '',
    //             'admin'=> '',
    //             'user'=>$this->Data->usuarioRead($id),
    //             'erro_nome'=> '',
    //             'erro_email'=>'',
    //             'erro_senha'=>'',
    //             'erro_data'=>''
    //         ];
    //     endif;


    //     $this->view("admin/editeuser",$dados);


    // }
}
