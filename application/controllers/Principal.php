<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

    public function __construct() {
        parent::__construct();
        session_start();
        
        if(!isset($_SESSION["user_data"])){
            redirect(base_url());
        }
        
    }

    public function index() {
        
        $codEmpresa = $_SESSION["company_data"]->codEmpresa;
        
        $this->load->Model("Model_venda", "venda");
        $this->load->Model("Model_ordem_servico", "os");
        $this->load->Model("Model_cliente", "clientes");

        $parametros = array(
            "totalVendasMes" => $this->venda->getTotalMes($codEmpresa)->num_rows(),
            "listagemMaisVendidos" => $this->venda->getProdutosMaisVendido($codEmpresa),
            "totalOSs" => $this->os->getListagemMes($codEmpresa)->num_rows(),
            "ultimas10OS" => $this->os->getUltimasN($codEmpresa, 10),
            "clientesCadastrados" => $this->clientes->getListagem($codEmpresa)->num_rows()
        );
        
        $this->load->view('inc/header');
        $this->load->view('inc/sidebar');
        $this->load->view('inc/menu_lateral');
        $this->load->view('inc/barra_superior');
        $this->load->view('dashboard/welcome_message', $parametros);
        $this->load->view('inc/show_messages');
    }

}
