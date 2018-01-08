<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produto extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        session_start();
        
        if(!isset($_SESSION["user_data"])){
            redirect(base_url());
        }
        
        $this->load->Model("Model_produto", "produto");        
    }
    
    public function index() 
    {
        $codEmpresa = $_SESSION["company_data"]->codEmpresa;
        
        /*Variavel que será usada para passar os parametros */
        $parametros = array();
        
        /*Buscando dados de produtos cadastrados*/
        $parametros["produtos"] = $this->produto->getListagem($codEmpresa);
        $parametros["numProdutos"] = $parametros["produtos"]->num_rows();
        $parametros["estoqueBaixo"] = $this->produto->getListagemEstoqueMinimo($codEmpresa);
        $parametros["categorias"] = $this->produto->getCategorias($codEmpresa)->num_rows();
        
        $this->load->view('inc/header');
        $this->load->view('inc/sidebar');
        $this->load->view('inc/menu_lateral');
        $this->load->view('inc/barra_superior');
        $this->load->view('produto/listagem', $parametros);
        $this->load->view('inc/show_messages');
    }
    
    public function novo()
    {
        $codEmpresa = $_SESSION["company_data"]->codEmpresa;
        /*Busco Informações necessárias para a tela*/

        $parametros = array(
            "categorias" => $this->produto->getCategorias($codEmpresa),
            "cadastro" => true
        );

        $this->load->view('inc/header');
        $this->load->view('inc/sidebar');
        $this->load->view('inc/menu_lateral');
        $this->load->view('inc/barra_superior');
        $this->load->view('produto/cadastro', $parametros);
        $this->load->view('inc/show_messages');
    }

    public function add()
    {
        $codEmpresa = $_SESSION["company_data"]->codEmpresa;
        
        /*Crio o vetor de parametros para a inserção do cliente*/
        $parametros = array(
            "titulo" => trim(filter_input(INPUT_POST, "txtNomeProduto")),
            "valor" => trim(filter_input(INPUT_POST, "txtValor")),
            "descricao" => trim(filter_input(INPUT_POST, "txtDescricao")),
            "estoque" => trim(filter_input(INPUT_POST, "txtEstoque")),
            "estoqueMinimo" => trim(filter_input(INPUT_POST, "txtMinimo")),
            "codCategoria" => intval(trim(filter_input(INPUT_POST, "txtCodCategoria"))),
            "status" => isset($_POST["txtStatus"])? 1: 0,
            "condicao" => intval(trim(filter_input(INPUT_POST, "txtCondicao"))),
            "codEmpresa" => $codEmpresa,
        );
        
        $this->db->insert("produto", $parametros);
        redirect(base_url("index.php/produto"));
    }
    
    public function edit($codProduto){

        $codEmpresa = $_SESSION["company_data"]->codEmpresa;
        /*Busco Informações necessárias para a tela*/

        $produto = $this->produto->getProduto($codProduto, $codEmpresa);

        if($produto->num_rows() > 0){

            $parametros = array(
                "categorias" => $this->produto->getCategorias($codEmpresa),
                "produto" => $produto->row(0)
            );

            $this->load->view('inc/header');
            $this->load->view('inc/sidebar');
            $this->load->view('inc/menu_lateral');
            $this->load->view('inc/barra_superior');
            $this->load->view('produto/alterar', $parametros);
            $this->load->view('inc/show_messages');
        
        } else {

            $_SESSION["msg_erro"] = "VOCE TENTOU ENTRAR EM UMA PÁGINA SEM PERMISSÃO";
            redirect(base_url());

        }
    } 

    public function update($codProduto) 
    {
        $codEmpresa = $_SESSION["company_data"]->codEmpresa;
        /*Busco Informações necessárias para a tela*/

        $parametros = array(
            "categorias" => $this->produto->getCategorias($codEmpresa),
            "cadastro" => false,
            "dados" => $this->produto->getProduto($codProduto, $codEmpresa)
        );

        $this->load->view('inc/header');
        $this->load->view('inc/sidebar');
        $this->load->view('inc/menu_lateral');
        $this->load->view('inc/barra_superior');
        $this->load->view('produto/cadastro2', $parametros);
        $this->load->view('inc/show_messages');

    }
    
    public function remove()
    {
        
    }
}
