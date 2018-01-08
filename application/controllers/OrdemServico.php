<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class OrdemServico extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        session_start();
        
        if(!isset($_SESSION["user_data"])){
            redirect(base_url());
        }
        
        $this->load->Model("Model_ordem_servico", "os");
    }
 
    public function index(){

        $codEmpresa = $_SESSION["company_data"]->codEmpresa;

        $parametros = array(
            "ordens" => $this->os->getOSNaoFinalizadas($codEmpresa),
            "vencendo_hj" => $this->os->getVencimentoHj($codEmpresa)->num_rows(),
            "pendentes" => $this->os->getListagem($codEmpresa, STATUS_OS_PENDENTE)->num_rows()
        );

        $parametros["nao_finalizadas"] = $parametros["ordens"]->num_rows();

        $this->load->view('inc/header');
        $this->load->view('inc/sidebar');
        $this->load->view('inc/menu_lateral');
        $this->load->view('inc/barra_superior');
        $this->load->view('os/listagem', $parametros);
        $this->load->view('inc/show_messages');
    }
    
    public function novo(){
        
        $codEmpresa = $_SESSION["company_data"]->codEmpresa;
        
        $this->load->Model("Model_cliente", "cliente");
        $this->load->Model("Model_servico", "servicos");
        $this->load->Model("Model_usuario", "funcionarios");
        $this->load->Model("Model_produto", "produtos");

        $parametros = array(
            "listagemClientes" => $this->cliente->getListagem($codEmpresa),
            "listagemServicos" => $this->servicos->getListagem($codEmpresa),
            "listagemFuncionarios" => $this->funcionarios->getListagemUsuarios($codEmpresa, STATUS_USUARIO_ATIVO),
            'listagemProdutos' => $this->produtos->getListagem($codEmpresa)
        );
        
        $this->load->view('inc/header');
        $this->load->view('inc/sidebar');
        $this->load->view('inc/menu_lateral');
        $this->load->view('inc/barra_superior');
        $this->load->view('os/cadastro2', $parametros);
        $this->load->view('inc/show_messages');
        
    }

    public function add(){

        //var_dump($_POST);

        $codEmpresa = intval($_SESSION["company_data"]->codEmpresa);

        $parametros = array(
            "codCliente" => intval(trim(filter_input(INPUT_POST, "txtCodCliente"))),
            "status" => intval(trim(filter_input(INPUT_POST, "txtSituacao"))),
            "codServico" => intval(trim(filter_input(INPUT_POST, "txtCodServico"))),
            "diagnostico" => trim(filter_input(INPUT_POST, "txtDiagnostico")),
            "codFuncionarioResponsavel" => intval(trim(filter_input(INPUT_POST, "txtCodFuncionario"))),
            "observacao" => trim(filter_input(INPUT_POST, "txtDiagnostico")),
            "dataEntrada" => trim(filter_input(INPUT_POST, "txtEntrada")),
            "dataPrevisao" => trim(filter_input(INPUT_POST, "txtPrevisaoSaida")),
            "valorTotal" => floatval(filter_input(INPUT_POST, "txtValorTotal")),
            "codEmpresa" => intval($_SESSION["company_data"]->codEmpresa),
            "codFuncionarioCadastrou" => intval($_SESSION["user_data"]->codUsuario),

        );

        $parametros["dataEntrada"] = $this->util->converterDatas($parametros["dataEntrada"]);
        $parametros["dataPrevisao"] = $this->util->converterDatas($parametros["dataPrevisao"]);

        $dataEntrada = explode('/', explode(' ', $parametros["dataEntrada"])[0]); 
        var_dump($parametros);
        
        $this->db->insert("ordem_servico", $parametros);

        $codOS = $this->db->insert_id();

        $parametrosPagamento = array(
            "codCliente" => $parametros["codCliente"],
            "valor" => $parametros["valorTotal"],
            "descr~icao" => "Pagamento da compra $codOS",
            "codEmpresa" => $parametros["codEmpresa"],
            "status" => STATUS_CONTA_ABERTO,
            "codUsuarioCadastrou" => intval($_SESSION["user_data"]->codUsuario),
            "tipoOrigem" => PAGAMENTO_POR_OS,
            "codOrigem" => $codOS
        );

        $this->db->insert("pagamento", $parametrosPagamento);

        redirect(base_url("index.php/pagamento/pagamentoOS/$codOS"));

    }
    
}