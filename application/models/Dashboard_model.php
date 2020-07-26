<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  
  class Dashboard_model extends CI_Model {

  public function getTotal($tabela=NULL) {
    
    if($tabela) {
      $query = $this->db->get($tabela);
      
      return $query->num_rows();
    }
  }
    
  public function getNoticia() {
    $this->db->select('noticia.id, noticia.resumo, noticia.dt_cad, noticia.estado, noticia.img');
    $this->db->from('noticia');
    $this->db->order_by('noticia.dt_cad', 'DESC');
    $this->db->limit(10);
    
    return $this->db->get()->result();
  }
}