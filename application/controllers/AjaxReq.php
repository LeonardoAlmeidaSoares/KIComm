<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AjaxReq extends CI_Controller {

    public function __construct() {
        parent::__construct();
        session_start();
    }

    public function getListagemProdutos() {

        $codEmpresa = $_SESSION["company_data"]->codEmpresa;

        $aux = $this->db->select("produto.codProduto as value, produto.titulo as label, produto.valor as valor")
                ->from("produto")
                ->where("codEmpresa", $codEmpresa)
                ->like('titulo', filter_input(INPUT_GET, 'txtAddProd'), 'both')
                ->get();
        echo json_encode($aux->result_array());
    }
    
    public function getListagemClientes() {

        $codEmpresa = $_SESSION["company_data"]->codEmpresa;

        $aux = $this->db->select("cliente.codCliente as value, cliente.nome as label ")
                ->from("cliente")
                ->where("codEmpresa", $codEmpresa)
                ->like('nome', filter_input(INPUT_GET, 'txtNome'), 'both')
                ->get();
        echo json_encode($aux->result_array());
    }
    
    public function getProduto(){
        $Produto = trim(filter_input(INPUT_POST, "produto"));
        $aux = $this->db->get_where("produto", array("titulo" => $Produto));
        echo json_encode($aux->result_array());
    }
    
    public function getCliente(){
        $Cliente = trim(filter_input(INPUT_POST, "cliente"));
        $aux = $this->db->get_where("cliente", array("nome" => $Cliente));
        echo json_encode($aux->result_array());
    }
    
    public function getDadosServico(){

        $cod = intval(trim(filter_input(INPUT_POST, "codigo")));
        //echo $cod;
        $ret = $this->db->get_where("servico", array("codServico" => $cod));
        echo json_encode($ret->result_array());
    } 

    public function getDadosProduto(){
        $cod = intval(trim(filter_input(INPUT_POST, "codigo")));
        //echo $cod;
        $ret = $this->db->get_where("produto", array("codProduto" => $cod));
        echo json_encode($ret->result_array());
    }

    public function getPendenciasFuncionario(){

        $this->load->Model("Model_ordem_servico", "OS");

        $codFuncionario = intval(trim(filter_input(INPUT_POST, "codFuncionario")));
        $aux = $this->OS->getPendenciasFuncionario($codFuncionario);
        
        echo json_encode($aux->result_array());
    }

    public function updateProduto($codProduto){

        $this->db->where("codProduto", $codProduto)->update("produto", $_POST);
        echo $this->db->last_query();
    }
}
