<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pagamento extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        session_start();
        
        if(!isset($_SESSION["user_data"])){
            redirect(base_url());
        }
        
        $this->load->Model("Model_pagamento", "pagto");
        $this->load->Model("Model_venda", "venda");       
        $this->load->Model("Model_cliente", "cliente");
    }

    public function index(){
        $codEmpresa = $_SESSION["company_data"]->codEmpresa;
        
        /*Variavel que será usada para passar os parametros */
        $parametros = array();
        
        /*Buscando dados de clientes cadastrados*/
        $parametros["pagamentos"] = $this->pagto->getListagem($codEmpresa);
        //$parametros["clientes_com_debito"] = $this->db->get_where("pagamento", 
        //        array("codEmpresa" => $codEmpresa, "status" => STATUS_CLIENTE_DEVENDO))->num_rows();
        //$parametros["numClientes"] = $this->db->get_where("cliente", array("codEmpresa" => $codEmpresa))->num_rows();
        //$parametros["numClientesProibido"] = $this->db->get_where("cliente", array("codEmpresa" => $codEmpresa, "status" => STATUS_CLIENTE_PROIBIDO))->num_rows();
        
        $this->load->view('inc/header');
        $this->load->view('inc/sidebar');
        $this->load->view('inc/menu_lateral');
        $this->load->view('inc/barra_superior');
        $this->load->view('pagamento/listagem', $parametros);
        $this->load->view('inc/show_messages');
    }
    
    public function novo(){
        
        $codEmpresa = $_SESSION["company_data"]->codEmpresa;
        
        $parametros = array(
            "dadosCliente" => $this->cliente->getListagem($codEmpresa)
        );
        
        $this->load->view('inc/header');
        $this->load->view('inc/sidebar');
        $this->load->view('inc/menu_lateral');
        $this->load->view('inc/barra_superior');
        $this->load->view('pagamento/cadastro', $parametros);
        $this->load->view('inc/show_messages');
    }
    
    public function add(){

        var_dump($_POST);

    }

    public function pagamentoOS($cod){
        echo "oi";
    }

    public function pagamentoCompra($cod){
        $codEmpresa = $_SESSION["company_data"]->codEmpresa;
        
        /*Variavel que será usada para passar os parametros */
        $parametros = array();
        
        /*Buscando dados de clientes cadastrados*/
        $pagto = $this->venda->getVenda($codEmpresa, $cod)->row(0);
       
        if($pagto->codEmpresa == $_SESSION["company_data"]->codEmpresa){
            $parametros["empresa"] = $_SESSION["company_data"];
            $parametros["cliente"] = $this->db->get_where("cliente", array("codCliente" => $pagto->codCliente))->row(0);
            $parametros["listaItens"] = $this->db->get_where("getlistaprodutosvenda",array("codVenda" => $pagto->codVenda));

        
            $parametros["pagto"] = [
                "codigo" => $pagto->codVenda,
                "desconto" => $pagto->desconto,
                "total" => $pagto->valor
            ];    
                
            $this->load->view('inc/header');
            $this->load->view('inc/sidebar');
            $this->load->view('inc/menu_lateral');
            $this->load->view('inc/barra_superior');
            $this->load->view('invoice/invoice', $parametros);
        
        } else {
            //var_dump($_SESSION["company_data"]);
            //redirect(base_url());
        }
    }

}