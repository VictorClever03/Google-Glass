<?php
namespace App\Models;

use App\Helpers\Valida;
use App\Libraries\Conexao;

class Usuarios {
   private $db;
    public function __construct()
    {
       $this->db = new Conexao();
    }
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
        $this->db->query("INSERT INTO usuarios(nome, email, senha, data_nascimento) VALUES(:nome, :email, :senha, :datta)");
        
        $this->db->bind(':nome', $data['nome'],"");
        $this->db->bind(':email', $data['email'], "");
        $this->db->bind(':senha', $data['senha'], "");
        $this->db->bind(':datta', $data['data'], "");


        if ($this->db->executa()) {
            return true;
        }
        else{ 
            return false;
        }
    }

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
}