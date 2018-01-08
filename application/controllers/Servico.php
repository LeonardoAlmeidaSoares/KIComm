<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Servico extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        session_start();
        
        if(!isset($_SESSION["user_data"])){
            redirect(base_url());
        }
        
        $this->load->Model("Model_servico", "servicos");        
    }
    
    public function index() {
        $codEmpresa = $_SESSION["company_data"]->codEmpresa;
        
        /*Variavel que será usada para passar os parametros */
        $parametros = array();
        
        /*Buscando dados de produtos cadastrados*/
        $parametros["servicos"] = $this->servicos->getListagem($codEmpresa);
        $parametros["numServicos"] = $parametros["servicos"]->num_rows();
        //$parametros["usuariosAtivos"] = $this->usuario->getListagemUsuarios($codEmpresa, STATUS_USUARIO_ATIVO)->num_rows();
        //$parametros["usuariosInativos"] = $this->usuario->getListagemUsuarios($codEmpresa, STATUS_USUARIO_INATIVO)->num_rows();

        $this->load->view('inc/header');
        $this->load->view('inc/sidebar');
        $this->load->view('inc/menu_lateral');
        $this->load->view('inc/barra_superior');
        $this->load->view('servico/listagem', $parametros);
        $this->load->view('inc/show_messages');
    }
    
    public function novo() {
        $this->load->view('inc/header');
        $this->load->view('inc/sidebar');
        $this->load->view('inc/menu_lateral');
        $this->load->view('inc/barra_superior');
        $this->load->view('servico/cadastro');
        $this->load->view('inc/show_messages');
    }

    public function add(){
        
        $codEmpresa = $_SESSION["company_data"]->codEmpresa;
        
        $parametros = array(
            "descricao" => trim(filter_input(INPUT_POST, "txtDescricao")),
            "valor" => str_replace(",",".",trim(filter_input(INPUT_POST, "txtValor"))),
            "codEmpresa" => $codEmpresa
        );
        
        if($this->db->insert("servico", $parametros)){
            redirect(base_url("index.php/servico"));
        }
        
    }
    
    public function edit($codServico){

        $codEmpresa = $_SESSION["company_data"]->codEmpresa;
        
        $servico = $this->servicos->getServico($codServico, $codEmpresa);

        if($servico->num_rows() > 0){

            $parametros = array(
                "servico" => $servico->row(0)
            );

            $this->load->view('inc/header');
            $this->load->view('inc/sidebar');
            $this->load->view('inc/menu_lateral');
            $this->load->view('inc/barra_superior');
            $this->load->view('servico/alterar', $parametros);
            $this->load->view('inc/show_messages');

        }else{
            $_SESSION["msg_erro"] = "VOCE TENTOU ENTRAR EM UMA PÁGINA SEM PERMISSÃO";
            redirect(base_url("principal"));
        }

    }

    public function update(){
        
        $codEmpresa = $_SESSION["company_data"]->codEmpresa;
        
        $codServico = intval(trim(filter_input(INPUT_POST, "txtCodServico")));

        $parametros = array(
            "descricao" => trim(filter_input(INPUT_POST, "txtDescricao")),
            "valor" => str_replace(",",".",trim(filter_input(INPUT_POST, "txtValor"))),
            "codEmpresa" => $codEmpresa
        );
        
        $this->db->where("codServico", $codServico)->update("servico", $parametros);

        redirect(base_url("index.php/servico"));
        

    }
    
    public function remove(){
        
    }
}
