<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  
  class Select_categorias_model extends CI_Model {
    
    // RETORNA DUAS NOTICIAS BASEADO NA CATEGORIA SELECIONADA.
    public function get2Noticias($meta_link=NULL, $id_categoria) {
      $this->db->select('noticia.id AS ID_NOTICIA, noticia.titulo, noticia.tag, noticia.dt_cad, noticia.img, noticia.resumo,
        categoria.id AS ID_CATEGORIA, categoria.meta_link, categoria.nome, noticia.id_editor');
      $this->db->from('noticia, categoria');
      $this->db->join('editores','editores.id = noticia.id_editor','left');
      $this->db->where('noticia.id_categoria', $id_categoria);
      $this->db->where('categoria.meta_link', $meta_link);
      $this->db->where(['noticia.estado' => 1]);
      $this->db->order_by('noticia.id',  'DESC');
      $this->db->limit(2);
      return $this->db->get()->result(); 
      
    }
    
    // RETORNA 10 NOTICIAS HANDOMICAMENTE BASEADO NA CATEGORIA SELECIONADA.
    public function getPorCategorias($meta_link=NULL, $id_categoria) {
      
      $this->db->select('noticia.id AS ID_NOTICIA, noticia.titulo, noticia.tag, noticia.dt_cad, noticia.img, noticia.resumo,
        categoria.id AS ID_CATEGORIA, categoria.meta_link, categoria.nome, noticia.id_editor');
      $this->db->from('noticia, categoria');
      $this->db->join('editores','editores.id = noticia.id_editor','left');
      $this->db->where('noticia.id_categoria', $id_categoria);
      $this->db->where('categoria.meta_link', $meta_link);
      $this->db->where(['noticia.estado' => 1]);
      $this->db->order_by('noticia.id',  'RANDOM');
      $this->db->limit(10);
      
      return $this->db->get()->result();
      
    }
  
  }
