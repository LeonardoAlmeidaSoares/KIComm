<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        session_start();
        
        if(!isset($_SESSION["user_data"])){
            redirect(base_url());
        }
        
        $this->load->Model("Model_usuario", "usuario");        
    }
    
    public function index() {
        $codEmpresa = $_SESSION["company_data"]->codEmpresa;
        
        /*Variavel que será usada para passar os parametros */
        $parametros = array();
        
        /*Buscando dados de produtos cadastrados*/
        $parametros["usuarios"] = $this->usuario->getListagemUsuarios($codEmpresa);
        $parametros["numUsuarios"] = $parametros["usuarios"]->num_rows();
        $parametros["usuariosAtivos"] = $this->usuario->getListagemUsuarios($codEmpresa, STATUS_USUARIO_ATIVO)->num_rows();
        $parametros["usuariosInativos"] = $this->usuario->getListagemUsuarios($codEmpresa, STATUS_USUARIO_INATIVO)->num_rows();

        $this->load->view('inc/header');
        $this->load->view('inc/sidebar');
        $this->load->view('inc/menu_lateral');
        $this->load->view('inc/barra_superior');
        $this->load->view('usuario/listagem', $parametros);
        $this->load->view('inc/show_messages');
    }
    
    public function novo() {
        $this->load->view('inc/header');
        $this->load->view('inc/sidebar');
        $this->load->view('inc/menu_lateral');
        $this->load->view('inc/barra_superior');
        $this->load->view('usuario/cadastro');
        $this->load->view('inc/show_messages');
    }

    public function add(){
        
        $codEmpresa = $_SESSION["company_data"]->codEmpresa;
        
        $parametros = array(
            "nome" => trim(filter_input(INPUT_POST, "txtNome")),
            "email" => trim(filter_input(INPUT_POST, "txtEmail", FILTER_SANITIZE_EMAIL)),
            "senha" => md5(trim(filter_input(INPUT_POST, "txtSenha"))),
            "telefone_1" => trim(filter_input(INPUT_POST, "txtTelefone1")),
            "telefone_2" => trim(filter_input(INPUT_POST, "txtTelefone2")),
            "codEmpresa" => $codEmpresa,
            "status" => STATUS_USUARIO_ATIVO
        );
        
        if($this->db->insert("usuario", $parametros)){
            redirect(base_url("index.php/usuario"));
        }
        
    }
    
    public function edit($codUsuario){

        $codEmpresa = $_SESSION["company_data"]->codEmpresa;

        $user = $this->usuario->getUsuario($codUsuario, $codEmpresa);

        if($user->num_rows() > 0){

            $parametros = array(
                "usuario" => $user->row(0)            
            );

            $this->load->view('inc/header');
            $this->load->view('inc/sidebar');
            $this->load->view('inc/menu_lateral');
            $this->load->view('inc/barra_superior');
            $this->load->view('usuario/alterar', $parametros);
            $this->load->view('inc/show_messages');
        
        } else {

            $_SESSION["msg_erro"] = "VOCE TENTOU ENTRAR EM UMA PÁGINA SEM PERMISSÃO";
            redirect(base_url("index.php/principal"));
        }

    } 

    public function update(){
        
        $codEmpresa = $_SESSION["company_data"]->codEmpresa;
        /*Busco Informações necessárias para a tela*/

        $codUsuario = intval(trim(filter_input(INPUT_POST, "txtCodUsuario")));

        $parametros = array(
            "nome" => trim(filter_input(INPUT_POST, "txtNome")),
            "email" => trim(filter_input(INPUT_POST, "txtEmail", FILTER_SANITIZE_EMAIL)),
            "telefone_1" => trim(filter_input(INPUT_POST, "txtTelefone1")),
            "telefone_2" => trim(filter_input(INPUT_POST, "txtTelefone2")),
        );

        $this->db->where("codUsuario", $codUsuario)->update("usuario", $parametros);
        redirect(base_url("index.php/usuario"));

    }
    
    public function remove(){
        
    }
}
