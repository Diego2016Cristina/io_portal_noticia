<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Busca_model extends CI_Model {

  public function getBusca($palavra_chave=NULL) {
    
    if($palavra_chave) {
      $this->db->select('noticia.*, editores.nome as editores, categoria.nome as categoria');
      $this->db->from('noticia');
      $this->db->join('editores','editores.id = noticia.id_editor','left');
      $this->db->join('categoria','categoria.id = noticia.id_categoria','left');
      $this->db->like('noticia.titulo', $palavra_chave, 'both');
      $this->db->where(['noticia.estado' => 1]);
      return $this->db->get()->result();
    }
    
  }
  
  public function qtdBusca($palavra_chave=NULL) {
    
    $this->db->select('noticia.*, editores.*');
    $this->db->from('noticia');
    $this->db->join('editores','editores.id = noticia.id_editor','left');
    $this->db->join('categoria','categoria.id = noticia.id_categoria','left');
    $this->db->like('noticia.titulo', $palavra_chave, 'both');
    $this->db->where(['noticia.estado' => 1]);
    $query = $this->db->get();
    return $query->num_rows();
    
  }
  
}