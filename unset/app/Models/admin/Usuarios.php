<?php
namespace App\Models\admin;
use App\Libraries\Conexao;

class Usuarios{

    private $db;
    public function __construct()
    {
       $this->db = new Conexao();
    }
// login
    public function checalogin($email,$senha,$nivel){
        $this->db->query("SELECT * FROM usuarios WHERE email=:e");
        $this->db->bind(':e',$email,"");
        $this->db->executa();
        if($this->db->executa() AND $this->db->total()):
            $resultado=$this->db->resultado();
        
                 if (password_verify($senha, $resultado['senha']) AND $resultado['nivel']==$nivel) :
                    return $resultado;
                else:
                    return false;
                endif;
                
        else:
            return false;
        endif;
    }
    // end login
    // home
    public function totalusers(){
        $this->db->query("SELECT COUNT(id) AS totalusers FROM usuarios");
        $this->db->executa();
        if($this->db->executa() AND $this->db->total()):
         return $this->db->resultado();
                
        else:
            return false;
        endif;
    }
    public function totalPosts(){
        $this->db->query("SELECT COUNT(id) AS totalposts FROM posts");
        $this->db->executa();
        if($this->db->executa() AND $this->db->total()):
         return $this->db->resultado();
                
        else:
            return false;
        endif;
    }
    public function totalPedido(){
        $this->db->query("SELECT COUNT(id) AS totalpedidos FROM solicitacao");
        $this->db->executa();
        if($this->db->executa() AND $this->db->total()):
         return $this->db->resultado();
                
        else:
            return false;
        endif;
    }
    public function totalA(){
        $this->db->query("SELECT COUNT(atendido) AS atend FROM solicitacao WHERE atendido=:sim");
        $this->db->bind(':sim','sim','');
        $this->db->executa();
        if($this->db->executa() AND $this->db->total()):
         return $this->db->resultado();
                
        else:
            return false;
        endif;
    }
    // end home
    // usuarios
    public function checaemail(string $email){
        $this->db->query("SELECT email FROM usuarios WHERE email=:e");
        $this->db->bind(':e',$email,"");
        $this->db->executa();
        if($this->db->executa() AND $this->db->total()):
            return true;
        else:
            return false;
        endif;
    }

    public function armazena(Array $data){
        $this->db->query("INSERT INTO usuarios(nome, email, senha, data_nascimento, nivel) VALUES(:nome, :email, :senha, :datta, :nivel)");
        
        $this->db->bind(':nome', $data['nome'],"");
        $this->db->bind(':email', $data['email'], "");
        $this->db->bind(':senha', $data['senha'], "");
        $this->db->bind(':datta', $data['data'], "");
        $this->db->bind(':nivel', $data['admin'], "");


        if ($this->db->executa()) {
            return true;
        }
        else{ 
            return false;
        }
    }
    public function usuariosRead()
    {
        $this->db->query("SELECT * FROM usuarios ORDER BY criado_em DESC");
        $this->db->executa();
        if ($this->db->executa() and $this->db->total()) :
           return $this->db->resultados();
        endif;
    }
    public function usuarioRead($id)
    {
        $this->db->query("SELECT * FROM usuarios WHERE id=:id");
        $this->db->bind(':id', $id, "");
        $this->db->executa();
        if ($this->db->executa() and $this->db->total()) :
           return $this->db->resultado();
        endif;
    }
    public function usuarioReadp($id)
    {
        $this->db->query("SELECT * FROM usuarios WHERE id=:id");
        $this->db->bind(':id', $id, "");
        $this->db->executa();
        if ($this->db->executa() and $this->db->total()) :
           return $this->db->resultado();
        endif;
    }


    public function deletar($id){
        $this->db->query("DELETE FROM usuarios WHERE id=:id");
        $this->db->bind(':id',$id,'');
        
        if ($this->db->executa() and $this->db->total()) {
            return true;
        } else {
            return false;
        }
    }

    public function atualiza($data, $id)
    {
        $this->db->query("UPDATE usuarios SET nome=:nome, email=:email, senha=:senha, data_nascimento=:datta, nivel=:nivel WHERE id=:id");
        $this->db->bind(':nome',$data['nome'],"");
        $this->db->bind(':email',$data['email'],"");
        $this->db->bind(':senha',$data['senha'],"");
        $this->db->bind(':datta',$data['data'],"");
        $this->db->bind(':nivel',$data['admin'],"");
        $this->db->bind(':id',$id,"");
        
        if ($this->db->executa() AND $this->db->total()) :
           return true;
        else:
            return false;
        endif;
    }
    // end usuarios
    // posts

    public function postsRead()
    {
        $this->db->query("SELECT *, posts.id as idposts, posts.criado_em as dataposts, usuarios.id as idusuarios, usuarios.criado_em as datausuarios  FROM posts INNER JOIN usuarios ON posts.id_usuarios=usuarios.id ORDER BY dataposts DESC");
       
        $this->db->executa();
        if ($this->db->executa() and $this->db->total()) :
           return $this->db->resultados();
        endif;
    }

    public function armazenapost(array $data)
    {
        $this->db->query("INSERT INTO posts(titulo, mensagem, id_usuarios) VALUES(:titulo, :mensagem, :usuario_id)");

        $this->db->bind(':titulo', $data['titulo'], "");
        $this->db->bind(':mensagem', $data['mensagem'], "");
        $this->db->bind(':usuario_id', $data['id'], "");

        if ($this->db->executa()and $this->db->total()) {
            return true;
        } else {
            return false;
        }
    }
    public function deletarposts($id){
        $this->db->query("DELETE FROM posts WHERE id=:id");
        $this->db->bind(':id',$id,'');
        
        if ($this->db->executa() and $this->db->total()) {
            return true;
        } else {
            return false;
        }
    }

    public function lerpostcada($id)
    {
        $this->db->query("SELECT *, posts.id as idposts, posts.criado_em as dataposts, usuarios.id as idusuarios, usuarios.criado_em as datausuarios  FROM posts INNER JOIN usuarios ON posts.id_usuarios=usuarios.id WHERE posts.id=:id");
        $this->db->bind(':id', $id, "");
        $this->db->executa();
        if ($this->db->executa() and $this->db->total()) :
           return $this->db->resultado();
        endif;
    }
    public function actualiza($data)
    {
        $this->db->query("UPDATE posts SET titulo=:titulo, mensagem=:texto WHERE id=:id");
        $this->db->bind(':titulo',$data['titulo'],"");
        $this->db->bind(':texto',$data['mensagem'],"");
        $this->db->bind(':id',$data['id'],"");
        
        if ($this->db->executa() AND $this->db->total()) :
           return true;
        else:
            return false;
        endif;
    }

    // perfil

    public function updateperfil($data){
        $this->db->query("UPDATE perfil INNER JOIN usuarios ON perfil.id_usuarios=usuarios.id SET nome=:nome, email=:email, trabalho=:trabalho, biografia=:biografia, endereco=:endereco, contacto=:contacto WHERE perfil.id_usuarios=:id");
        $this->db->bind(':nome',$data['nome'],'');
        $this->db->bind(':email',$data['email'],'');
        $this->db->bind(':trabalho',$data['trabalho'],'');
        $this->db->bind(':biografia',$data['about'],'');
        $this->db->bind(':endereco',$data['endereco'],'');
        $this->db->bind(':contacto',$data['contacto'],'');
        $this->db->bind(':id',$data['id'],'');
        if ($this->db->executa()and $this->db->total()) {
            return true;
        } else {
            return false;
        }
        
    }
    public function viewperfil($id){
        $this->db->query("SELECT * FROM perfil INNER JOIN usuarios ON perfil.id_usuarios=usuarios.id  WHERE id_usuarios=:id");
        $this->db->bind(':id',$id,'');
        if ($this->db->executa()and $this->db->total()) {
            return $this->db->resultado();
        } else {
            return false;
        }
    }
    public function storeperfil(){
        $data=['trabalho'=>'Não editado.',
                'about'=>'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perferendis, omnis.',
                'endereco'=>'ex. Angola,Luanda-Cacuaco',
                'contacto'=>'ex. 999-999-999'
              ];
              $id=$this->db->ultimoid();
        $this->db->query("INSERT INTO perfil(trabalho,biografia,endereco,contacto,id_usuarios) VALUES(:trabalho,:biografia,:endereco,:contacto,:id_usuarios)");
        $this->db->bind(':trabalho',$data['trabalho'],'');
        $this->db->bind(':biografia',$data['about'],'');
        $this->db->bind(':endereco',$data['endereco'],'');
        $this->db->bind(':contacto',$data['contacto'],'');
        $this->db->bind(':id_usuarios',$id,'');
        if ($this->db->executa()and $this->db->total()) {
            return true;
        } else {
            return false;
        }
    }
    public function storeupload(){
        $caminho='public/img/undraw_profile_2.svg';
        $id=$this->db->ultimoid();
        $this->db->query("INSERT INTO uploads(path,id_usuario) VALUES(:pathh, :id_usuarios)");
        $this->db->bind(':pathh',$caminho,'');
        $this->db->bind(':id_usuarios',$id,'');
        if ($this->db->executa()and $this->db->total()) {
            return true;
        } else {
            return false;
        } 
    }
    public function updateupload($data){
        $this->db->query("UPDATE uploads SET path=:pathh WHERE id_usuario=:id_usuarios ");
        // UPDATE uploads INNER JOIN posts ON uploads.id_usuario=posts.id_usuarios SET path=:pathh, titulo='info' WHERE id_usuario=:id_usuarios
        $this->db->bind(':pathh',$data['path'],'');
        $this->db->bind(':id_usuarios',$data['id'],'');
        if ($this->db->executa()and $this->db->total()) {
            return true;
        } else {
            return false;
        }
    }
    public function readupload($id){
        $this->db->query("SELECT * FROM uploads WHERE id_usuario=:id");
        $this->db->bind(':id',$id,'');
        if($this->db->executa() AND $this->db->total()){
            return $this->db->resultado();
        }else{
            return false;
        }
    }
    public function deletefotos($data)
    {
        $this->db->query("UPDATE uploads SET path=:path WHERE id_usuario=:id");
        $this->db->bind(':path',$data['path'],'');
        $this->db->bind(':id',$data['id'],'');
        if ($this->db->executa() ) {
            return true;
        } else {
            return false;
        }
    }
    public function newpass($data, int $id)
    {
        $this->db->query("UPDATE usuarios SET senha=:senha WHERE id=:id");
        $this->db->bind(':senha',$data['novasenha'],'');
        $this->db->bind(':id',$id,'');
        if ($this->db->executa() AND $this->db->total()) {
            return true;
        } else {
            return false;
        }
    }
    // pedidos
    public function lerpedidos(){
        $this->db->query("SELECT *,solicitacao.id as idpedido, usuarios.id as idusuarios FROM solicitacao INNER JOIN usuarios ON solicitacao.id_usuarios=usuarios.id WHERE atendido=:atend");
        $this->db->bind(':atend','nao','');
        if($this->db->executa() AND $this->db->total()){
            return $this->db->resultados();
        }else{
            return false;
        }
    }
    public function lerpedidosS(){
        $this->db->query("SELECT *,solicitacao.id as idpedido, usuarios.id as idusuarios FROM solicitacao INNER JOIN usuarios ON solicitacao.id_usuarios=usuarios.id WHERE atendido=:atend");
        $this->db->bind(':atend','sim','');
        if($this->db->executa() AND $this->db->total()){
            return $this->db->resultados();
        }else{
            return false;
        }
    }
    public function atendido(int $id)
    {
        $this->db->query("UPDATE solicitacao SET atendido=:atend WHERE id=:id");
        $this->db->bind(':atend','sim','');
        $this->db->bind(':id',$id,'');
        if ($this->db->executa() AND $this->db->total()) {
            return true;
        } else {
            return false;
        }
    }
}