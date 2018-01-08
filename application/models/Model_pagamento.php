<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pagamento extends CI_Model {

	public function getListagem($codEmpresa){

    	return $this->db->select("pagamento.*")
    			->from("pagamento")
    			->where("codEmpresa", $codEmpresa)
    			->get();

    }

    public function getPagamento($codPagamento){
        return $this->db->get_where("pagamento", array("codPagamento" => $codPagamento));
    }
    
}
