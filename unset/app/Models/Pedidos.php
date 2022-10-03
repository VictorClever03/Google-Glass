<?php
namespace App\Models;
use App\Libraries\Conexao;


class Pedidos extends Conexao{
    private $db ;
    public function __construct()
    {
        $this->db= new Conexao;
    }
    public function armazenarP($data)
    {
        $this->db->query("INSERT INTO solicitacao(localidade, numero, grau, quantidade, preco, id_usuarios) VALUES(:local, :numero, :grau, :qtd, :preco, :id)");
    
        $this->db->bind(':local',$data['local'],'');
        $this->db->bind(':numero',$data['contacto'],'');
        $this->db->bind(':qtd',$data['qtd'],'');
        $this->db->bind(':preco',$data['preco'].'$','');
        $this->db->bind(':grau',$data['grau'],'');
        $this->db->bind(':id',$data['id'],'');
        if($this->db->executa() and $this->db->total()): 
            return true;
        else:
            return false;
        endif;
    }
}