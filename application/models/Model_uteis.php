<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_uteis extends CI_Model {

    public function converterDatas($dataEntrada){

    	$date = explode(" ", $dataEntrada);
    	$arrDia = explode("/", $date[0]);

    	return $arrDia[2] . "-" . $arrDia[1] . "-" . $arrDia[0] . " " . $date[1];
    }
    
}
