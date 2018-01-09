<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pagamento extends CI_Model {

	public function getListagem($codEmpresa){

    	return $this->db->select("p.codPagamento, p.descricao, date_format(p.dataVencimento, '%d/%m/%Y') as data, p.valor, cli.nome")
    			->from("pagamento p")
    			->join("cliente cli", "cli.codCliente = p.codCliente")
    			->where("p.codEmpresa", $codEmpresa)
    			->get();

    }

    public function getVencimentoHoje($codEmpresa){
    	return $this->db->query("select * from pagamento where dataVencimento = DATE_FORMAT(NOW(), '%Y-%m-%d') and codEmpresa = $codEmpresa and status = " . STATUS_CONTA_ABERTO);
    }

    public function getVencimentoEsseMes($codEmpresa){
    	return $this->db->query("select * from pagamento where (DATE_FORMAT(dataVencimento, '%m/%Y')) = DATE_FORMAT(NOW(), '%m/%Y') and codEmpresa = ? and status = ?" , array("$codEmpresa", STATUS_CONTA_ABERTO ));
    }

    public function getVencidas($codEmpresa){
    	return $this->db->query("select * from pagamento where dataVencimento < CURDATE() and codEmpresa = ? and status = ?" , array("$codEmpresa", STATUS_CONTA_ABERTO ));
    }


    public function getPagamento($codPagamento){
        return $this->db->get_where("pagamento", array("codPagamento" => $codPagamento));
    }
    
}
