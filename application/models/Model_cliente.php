<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_cliente extends CI_Model {

    public function getListagem($codEmpresa){

    	return $this->db->select("cliente.*")
    			->from("cliente")
    			->where("codEmpresa", $codEmpresa)
    			->where("status<>", STATUS_CLIENTE_INATIVO)
    			->get();

    }

    public function getCliente($codCliente, $codEmpresa){
    	return $this->db->get_where("cliente", array("codEmpresa" => $codEmpresa, "codCliente" => $codCliente));
    }
    
}
