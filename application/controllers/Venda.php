<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Venda extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        session_start();
        
        if(!isset($_SESSION["user_data"])){
            redirect(base_url());
        }
        
        $this->load->Model("Model_venda", "venda");        
    }
    
    public function index() {
        $codEmpresa = $_SESSION["company_data"]->codEmpresa;
        
        /*Variavel que será usada para passar os parametros */
        $parametros = array();
        
        /*Buscando dados de produtos cadastrados*/
        $parametros["vendas"] = $this->venda->getListagem($codEmpresa);

        $this->load->view('inc/header');
        $this->load->view('inc/sidebar');
        $this->load->view('inc/menu_lateral');
        $this->load->view('inc/barra_superior');
        $this->load->view('venda/listagem', $parametros);
        $this->load->view('inc/show_messages');
    }
    
    public function novo() {
        
        $codEmpresa = $_SESSION["company_data"]->codEmpresa;
        
        $parametros = array(
            "produtos" => $this->venda->getListaItensVenda($codEmpresa)
        );
        
        $this->load->view('inc/header');
        $this->load->view('inc/sidebar');
        $this->load->view('inc/menu_lateral');
        $this->load->view('inc/barra_superior');
        $this->load->view('venda/cadastro', $parametros);
        $this->load->view('inc/show_messages');
    }

    public function add(){
        
        $codEmpresa = $_SESSION["company_data"]->codEmpresa;
        
        $lista = json_decode(filter_input(INPUT_POST, "txtLista"));
        $codCliente = intval(trim(filter_input(INPUT_POST, "txtCodCliente")));
        $obs = filter_input(INPUT_POST, "txtObs");
        $valorTotal = doubleval(trim(filter_input(INPUT_POST, "txtValorTotal")));
        $desconto = doubleval(trim(filter_input(INPUT_POST, "txtValorDesconto")));
        
        $parametros = array(
            "titulo" => "Venda Realizada as " . date("d/m/Y H:i"),
            "codCliente" => $codCliente,
            "valor" => ($valorTotal - $desconto),
            "observacao" => $obs,
            "codResponsavel" => $_SESSION["user_data"]->codUsuario,
            "desconto" => $desconto,
            "codEmpresa" => $codEmpresa
        );

        $this->db->insert("venda", $parametros);
        $codVenda = $this->db->insert_id();
        
        $parametrosItemVenda = array(
            "codVenda" => $codVenda
        );
        
        foreach($lista as $item){
            $parametrosItemVenda["qtd"] = $item->qtd;
            $parametrosItemVenda["codProduto"] = $item->codProduto;
            $parametrosItemVenda["valorunitario"] = $item->valor;
            
            $this->db->insert("item_venda", $parametrosItemVenda);
            
        }
        redirect(base_url("index.php/pagamento/pagamentoCompra/$codVenda"));
        
    }
    
    public function update(){
        
    }
    
    public function remove(){
        
    }
}
