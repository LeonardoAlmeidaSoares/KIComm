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
        $parametros["vencimentosHoje"] = $this->pagto->getVencimentoHoje($codEmpresa)->num_rows();
        $parametros["vencimentosEsseMes"] = $this->pagto->getVencimentoEsseMes($codEmpresa)->num_rows();
        $parametros["ContasVencidas"] = $this->pagto->getVencidas($codEmpresa)->num_rows();
        
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
            "dadosCliente" => $this->cliente->getListagem($codEmpresa),
            "tipoOrigem" => CODIGO_TIPO_PAGAMENTO_AVULSO
        );
        
        $this->load->view('inc/header');
        $this->load->view('inc/sidebar');
        $this->load->view('inc/menu_lateral');
        $this->load->view('inc/barra_superior');
        $this->load->view('pagamento/cadastro', $parametros);
        $this->load->view('inc/show_messages');
    }
    
    public function add(){

        $codEmpresa = $_SESSION["company_data"]->codEmpresa;

        $parametros = array(
            "codCliente" => intval(trim(filter_input(INPUT_POST, "txtcodCliente"))),
            "valor" => floatval(str_replace(",",".",trim(filter_input(INPUT_POST, "txtValor")))),
            "descricao" => trim(filter_input(INPUT_POST, "txtDescricao")),
            "codEmpresa" => $codEmpresa,
            "status" => STATUS_CONTA_ABERTO,
            "codUsuarioCadastrou" => $_SESSION["user_data"]->codUsuario,
            "tipoOrigem" => intval(trim(filter_input(INPUT_POST, "txtTipoOrigem"))),
            "codOrigem" => intval(trim(filter_input(INPUT_POST, "txtCodOrigem"))),
        );

        if(intval(trim(filter_input(INPUT_POST, "txtPagamentoAVista"))) == 1){
            $parametros["dataPagto"] = date('Y-m-d H:i');
            $parametros["status"] = STATUS_CONTA_PAGO;
            $parametros["codUsuarioFinalizou"] = $_SESSION["user_data"]->codUsuario;
        }

        //var_dump($parametros);
        $this->db->insert("pagamento", $parametros);
        redirect(base_url("index.php/pagamento"));

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