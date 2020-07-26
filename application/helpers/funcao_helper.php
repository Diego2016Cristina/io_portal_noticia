<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  function setMsg($id, $msg, $tipo) {

    $CI =& get_instance();
    switch ($tipo) {
      case 'erro':
        $CI->session->set_flashdata($id, '<div class="alert alert-danger" role="alert">'. $msg .'</div>');
        break;
      case 'sucesso':
        $CI->session->set_flashdata($id, '<div class="alert alert-success" role="alert">'. $msg .'</div>');
        break;
      case 'erroLogin':
        $CI->session->set_flashdata($id, '<div class="alert alert-danger mark">'. $msg .'</div>');
      break;
      case 'successLogin':
        $CI->session->set_flashdata($id, '<div class="card green darken-1 mark" id="m3" style="position:relative; padding: 5px; color: #fff; font-weight: bold; border-top-left-radius: 15px">'. $msg .'</div>');
      break;
    }

    return FALSE;
  }

  function getMsg($id) {
    
    $CI =& get_instance();
    if($CI->session->flashdata($id) ) {
      echo $CI->session->flashdata($id);
    }
  }

  function dataDiaDb() {
    date_default_timezone_set('America/Manaus');
    $formato = 'DATE_W3C';
    $hora = time();
    return standard_date($formato, $hora);
  }

  function errosValidacao() {
    if(validation_errors()) {
      echo '<div class="alert alert-danger" role="alert">'. validation_errors() .'</div>';
    }
  }

  function formatarDataV($dados=NULL) {
    if($dados) {
      //Entrada 2020-03-28
      $dados = explode('-', $dados);

      //Saída 28-03-2020
      return $dados[2] .'/'. $dados[1].'/'.$dados[0];
    }
  }

  function slug($string=NULL){
    $string = remove_acentos($string);
    return url_title($string, '-', TRUE);
  }
  
  function remove_acentos($string=NULL){
    $procurar    = array('À','Á','Ã','Â','É','Ê','Í','Ó','Õ','Ô','Ú','Ü','Ç','à','á','ã','â','é','ê','í','ó','õ','ô','ú','ü','ç');
    $substituir  = array('a','a','a','a','e','r','i','o','o','o','u','u','c','a','a','a','a','e','e','i','o','o','o','u','u','c');
    return str_replace($procurar, $substituir, $string);
  }
