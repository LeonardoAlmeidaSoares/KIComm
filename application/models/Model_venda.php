<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_venda extends CI_Model {

    public function getListagem($codEmpresa){
        return $this->db->select("venda.*, cliente.nome")
                ->from("venda")
                ->join('cliente', "cliente.codCliente = venda.codCliente")
                ->where("venda.codEmpresa", $codEmpresa)
                ->get();
    }
    
    public function getListaItensVenda($codEmpresa){
        return $this->db->select("produto.titulo, produto.codProduto")
                ->from("produto")
                ->where("codEmpresa",$codEmpresa)
                //->like('titulo', filter_input(INPUT_GET, 'txtAddProd'), 'both')
                ->get();
    }
    
    public function getVenda($codEmprea, $codVenda){
        return $this->db->get_where("venda", array("codEmpresa" => $codEmprea, "codVenda" => $codVenda));
    }
    
    public function getTotalMes($codEmpresa){
        return $this->db->query(
                "select * from venda where codEmpresa = $codEmpresa and MONTH(dataPedido) = MONTH(NOW())"
        );
    }
        
    public function getProdutosMaisVendido($codEmpresa){
        return $this->db->select("sum(item_venda.qtd) as qtd, produto.codProduto, produto.titulo, produto.estoque")
                ->from("item_venda")
                ->join("produto", "produto.codPRoduto = item_venda.codProduto")
                ->join("venda", "venda.codVenda = item_venda.codVenda")
                ->where("venda.codEmpresa", $codEmpresa)
                ->order_by("qtd, codProduto, titulo")
                ->get();
    }
    
}
