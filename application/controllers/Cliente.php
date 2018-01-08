<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        session_start();
        
        if(!isset($_SESSION["user_data"])){
            redirect(base_url());
        }
        
        $this->load->Model("Model_cliente", "cliente");        
    }
    
    public function index() 
    {
        $codEmpresa = $_SESSION["company_data"]->codEmpresa;
        
        /*Variavel que será usada para passar os parametros */
        $parametros = array();
        
        /*Buscando dados de clientes cadastrados*/
        $parametros["clientes"] = $this->cliente->getListagem($codEmpresa);
        $parametros["clientes_com_debito"] = $this->db->get_where("pagamento", 
                array("codEmpresa" => $codEmpresa, "status" => STATUS_CLIENTE_DEVENDO))->num_rows();
        $parametros["numClientes"] = $this->db->get_where("cliente", array("codEmpresa" => $codEmpresa))->num_rows();
        $parametros["numClientesProibido"] = $this->db->get_where("cliente", array("codEmpresa" => $codEmpresa, "status" => STATUS_CLIENTE_PROIBIDO))->num_rows();
        
        $this->load->view('inc/header');
        $this->load->view('inc/sidebar');
        $this->load->view('inc/menu_lateral');
        $this->load->view('inc/barra_superior');
        $this->load->view('cliente/listagem', $parametros);
        $this->load->view('inc/show_messages');
    }
    
    public function novo()
    {
        $this->load->view('inc/header');
        $this->load->view('inc/sidebar');
        $this->load->view('inc/menu_lateral');
        $this->load->view('inc/barra_superior');
        $this->load->view('cliente/cadastro');
        $this->load->view('inc/show_messages');
    }

    public function add()
    {
        $codEmpresa = $_SESSION["company_data"]->codEmpresa;
        
        /*Crio o vetor de parametros para a inserção do cliente*/
        $parametros = array(
            "nome" => trim(filter_input(INPUT_POST, "txtNome")),
            "telefone_1" => trim(filter_input(INPUT_POST, "txtTelefone1")),
            "telefone_2" => trim(filter_input(INPUT_POST, "txtTelefone2")),
            "email" => trim(filter_input(INPUT_POST, "txtEmail", FILTER_SANITIZE_EMAIL)),
            "cpf" => trim(filter_input(INPUT_POST, "txtCpf")),
            "rg" => trim(filter_input(INPUT_POST, "txtRg")),
            "logradouro" => trim(filter_input(INPUT_POST, "txtLogradouro")),
            "complemento" => trim(filter_input(INPUT_POST, "txtComplemento")),
            "numero" => trim(filter_input(INPUT_POST, "txtNumero")),
            "bairro" => trim(filter_input(INPUT_POST, "txtBairro")),
            "cep" => trim(filter_input(INPUT_POST, "txtCep")),
            "cidade" => trim(filter_input(INPUT_POST, "txtCidade")),
            "status" => 1,
            "codEmpresa" => $codEmpresa,
            "codUsuario" => 1
        );
        
        $this->db->insert("cliente", $parametros);
        redirect(base_url("index.php/cliente"));
    }
    
    public function edit($codCliente){

        $codEmpresa = $_SESSION["company_data"]->codEmpresa;

        $cliente = $this->cliente->getCliente($codCliente, $codEmpresa);

        if($cliente->num_rows() == 1){

            $parametros = array(
                "cliente" => $cliente->row(0)
            );

            $this->load->view('inc/header');
            $this->load->view('inc/sidebar');
            $this->load->view('inc/menu_lateral');
            $this->load->view('inc/barra_superior');
            $this->load->view('cliente/alterar', $parametros);
            $this->load->view('inc/show_messages');

        }else{

            $_SESSION["msg_erro"] = "VOCE TENTOU ENTRAR EM UMA PÁGINA SEM PERMISSÃO";
            redirect(base_url("principal"));

        }


    }

    public function update() 
    {
        $codEmpresa = $_SESSION["company_data"]->codEmpresa;
    
        $codCliente = intval(trim(filter_input(INPUT_POST, "txtCodCliente")));

        $parametros = array(
            "nome" => trim(filter_input(INPUT_POST, "txtNome")),
            "telefone_1" => trim(filter_input(INPUT_POST, "txtTelefone1")),
            "telefone_2" => trim(filter_input(INPUT_POST, "txtTelefone2")),
            "email" => trim(filter_input(INPUT_POST, "txtEmail", FILTER_SANITIZE_EMAIL)),
            "cpf" => trim(filter_input(INPUT_POST, "txtCpf")),
            "rg" => trim(filter_input(INPUT_POST, "txtRg")),
            "logradouro" => trim(filter_input(INPUT_POST, "txtLogradouro")),
            "complemento" => trim(filter_input(INPUT_POST, "txtComplemento")),
            "numero" => trim(filter_input(INPUT_POST, "txtNumero")),
            "bairro" => trim(filter_input(INPUT_POST, "txtBairro")),
            "cep" => trim(filter_input(INPUT_POST, "txtCep")),
            "cidade" => trim(filter_input(INPUT_POST, "txtCidade")),
            "status" => STATUS_CLIENTE_ATIVO,
            "codEmpresa" => $codEmpresa,
            "codUsuario" => 1
        );

        $this->db->where("codCliente", $codCliente)->update("cliente", $parametros);
        redirect(base_url("index.php/cliente"));

    }
    
    public function remove()
    {
        $cliente = intval(trim(filter_input(INPUT_POST, "codigo")));
        $this->db->where("codCliente", $cliente)->update("cliente", array("status" => STATUS_CLIENTE_INATIVO));
    }
}
