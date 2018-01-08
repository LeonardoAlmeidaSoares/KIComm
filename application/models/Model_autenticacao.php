<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_autenticacao extends CI_Model {

    public function getListagem($codEmpresa){
        return $this->db->get_where("cliente", array("codEmpresa" => $codEmpresa));
    }
    
}
