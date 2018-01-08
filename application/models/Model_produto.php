<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_produto extends CI_Model {

    public function getListagem($codEmpresa){
        return 
        	$this->db->select("produto.*, categoria.descricao as categoria")
        	->from("produto")
        	->join("categoria", "categoria.codCategoria = produto.codCategoria")
        	->where("produto.status", 1)
        	->where("categoria.status", 1)
        	->where("produto.codEmpresa", 1)
        	->get();
    }

    public function getListagemEstoqueMinimo($codEmpresa){
    	return $this->db->query("select * from produto where estoqueMinimo >= estoque and codEmpresa = $codEmpresa");
    }

    public function getCategorias($codEmpresa){
    	return $this->db->get_where("categoria", array("codEmpresa" => $codEmpresa, "status" => 1));
    }
    
    public function getProduto($codProduto, $codEmpresa){
    	return $this->db->get_where("produto", array("codProduto" => $codProduto, "codEmpresa" => $codEmpresa));
    }


}
