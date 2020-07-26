<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
class Comentario_model extends CI_Model {

  //LISTAR OS BANNERS
  public function getComentario() {
    
    $this->db->select('comentario.*, noticia.titulo');
    $this->db->from('comentario');
    $this->db->join('noticia', 'noticia.id = comentario.id_not');
    return $this->db->get()->result();
    
    
  }
  
  public function getComentarioId($id_comentario=NULL) {
    
    if($id_comentario) {
      
      $this->db->select('comentario.*, noticia.titulo, noticia.resumo');
      $this->db->from('comentario');
      $this->db->join('noticia', 'noticia.id = comentario.id_not');
      $this->db->where('comentario.id_comentario', $id_comentario);
      $this->db->limit(1);
      return $this->db->get()->row();
      
    }
    
  }
  
  //FUNÇAO PARA ATUALIZAR COMENTÁRIOS
  public function doUpdate($dadosComentario=NULL, $id_comentario=NULL) {
    
    if(is_array($dadosComentario)) {
      
      $this->db->update('comentario', $dadosComentario, array('id_comentario' => $id_comentario));
      
      if($this->db->affected_rows() > 0) {
        setMsg('msgCadastro', 'Comentario liberado com sucesso', 'sucesso');
      } else {
        setMsg('msgCadastro', 'Ops! Não foi alterado nenhum comentário', 'erro');
      }
      
    }
    
  }
}