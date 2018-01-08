<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_servico extends CI_Model {
    
    public function getListagem($codEmpresa){
        return $this->db->get_where("servico", array("codEmpresa" => $codEmpresa));
    }

    public function getServico($codServico, $codEmpresa){
    	return $this->db->get_where("servico", array("codEmpresa" => $codEmpresa, "codServico" => $codServico));	
    }
            
}
