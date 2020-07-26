<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CSV_model extends CI_Model {
  
  //CADASTRAR
    function doInsert($dados=NULL) { 
        if(is_array($dados)) {
          
          $this->db->insert_batch('noticia', $dados);

            if($this->db->affected_rows() > 0) {
                echo "Dados adicionado com sucesso";
            } else {
                echo "Ops! Tivemos um pequeno erro ao tentar adicionar dados.";
            }
          
        } else {
          
          echo "Sem nenhum valor!";
          
        }
    }
  
}