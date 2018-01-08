<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        session_start();
    }

    public function index() {
        $this->load->view('auth/login');
    }

    public function logout() {
        session_destroy();
        redirect(base_url());
    }

    public function sign_in() {

        $email = trim(filter_input(INPUT_POST, "email"));
        $senha = md5(trim(filter_input(INPUT_POST, "senha")));

        $selection = $this->db->get_where('usuario', array("status" => STATUS_USUARIO_ATIVO, "email" => $email));
        $found = false;


        if ($selection->num_rows() > 0) {
            foreach ($selection->result() as $item) {
                if ($item->senha == $senha) {
                    $_SESSION["msg"] = array(
                        "type" => MSG_TYPE_SUCCESS,
                        "text" => "Bem-vindo, $item->nome"
                    );

                    $_SESSION["user_data"] = $item;
                    $_SESSION["company_data"] = $this->db->get_where("empresa", array("codEmpresa" => $item->codEmpresa))->row(0);

                    redirect(base_url("index.php/principal/"));
                }
            }
            if ($found == false) {
                $_SESSION["msg"] = array(
                    "type" => MSG_TYPE_ERROR,
                    "text" => "Senha não confere"
                );
                redirect(base_url());
            }
        } else {
            $_SESSION["msg"] = array(
                "type" => MSG_TYPE_ERROR,
                "text" => "Email não encontrado"
            );
            redirect(base_url());
        }
    }

}
