<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_ordem_servico extends CI_Model {

    public function getListagem($codEmpresa, $codStatus){
        return $this->db->get_where("ordem_servico", array("codEmpresa" => $codEmpresa, "status" => $codStatus));
    }

    public function getListagemMes($codEmpresa){
        return $this->db->get_where("ordem_servico", array("codEmpresa" => $codEmpresa, "MONTH(dataCadastro) = MONTH(curdate())"=>null));    
    }

    public function getOSNaoFinalizadas($codEmpresa){

    	return $this->db->select("ordem_servico.*, cliente.nome as cliente, usuario.nome as funcionario")
    		->from("ordem_servico")
    		->join("cliente", "cliente.codCliente = ordem_servico.codCliente")
    		->join("usuario", "ordem_servico.codFuncionarioResponsavel = usuario.codUsuario")
    		->where("ordem_servico.status not in (" . STATUS_OS_FINALIZADA . ", " . STATUS_OS_ARMAZENADA ." )")
    		->where("ordem_servico.codEmpresa", $codEmpresa)
    		->get();

    }

    public function getVencimentoHj($codEmpresa){
        return $this->db->select("ordem_servico.*, cliente.nome as cliente, usuario.nome as funcionario")
            ->from("ordem_servico")
            ->join("cliente", "cliente.codCliente = ordem_servico.codCliente")
            ->join("usuario", "ordem_servico.codFuncionarioResponsavel = usuario.codUsuario")
            ->where("ordem_servico.status not in (" . STATUS_OS_FINALIZADA . ", " . STATUS_OS_ARMAZENADA ." )")
            ->where("ordem_servico.codEmpresa", $codEmpresa)
            ->where("DATE_FORMAT(ordem_servico.dataPrevisao,'%Y-%m-%d') = curdate()")
            ->get();
    }

    public function getUltimasN($codEmpresa, $qtd){
        return $this->db->select("ordem_servico.*, cliente.nome as cliente, usuario.nome as funcionario")
            ->from("ordem_servico")
            ->join("cliente", "cliente.codCliente = ordem_servico.codCliente")
            ->join("usuario", "ordem_servico.codFuncionarioResponsavel = usuario.codUsuario")
            ->where("ordem_servico.codEmpresa", $codEmpresa)
            ->limit($qtd)
            ->get();
    }
    
}
