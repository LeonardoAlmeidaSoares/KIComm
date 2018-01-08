<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_usuario extends CI_Model {

    public function getListagemUsuarios($codEmpresa, $cod = 0){
        $filtro = array("codEmpresa" => $codEmpresa);
        if($cod > 0){
            $filtro["status"] = $cod;
        }
        return $this->db->get_where("usuario", $filtro);
    }
    
    public function getUsuario($codUsuario, $codEmpresa){
    	return $this->db->get_where("usuario", array("codEmpresa" => $codEmpresa, "codUsuario" => $codUsuario));
    }

}
