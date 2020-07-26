<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Portal_model extends CI_Model {
        
        public function getOneNoticiaRandomica() {//PEGA SOMENTE UMA NOTICIA RANDOMICAMENTE.

            $this->db->select('*');
            $this->db->where(['destaque' => 1, 'estado' => 1]);
            $this->db->limit(1);
            $this->db->order_by('id', 'RANDOM');
            return $this->db->get('noticia')->result();

        }
      
        public function get_banner_horizontal_1() {
            $this->db->select('*');
            $this->db->where(['ativo' => 1]);
            $this->db->limit(1);
            $this->db->order_by('id', 'RANDOM');
            
            /*$banner = $this->db->get('banner')->result();
          echo var_dump($banner);
          
          exit;*/
            return $this->db->get('banner')->result();
        }

        public function get_banner_horizontal_2() {
            $this->db->select('*');
            $this->db->where(['ativo' => 1]);
            $this->db->limit(1);
            $this->db->order_by('id', 'RANDOM');
            
            /*$banner = $this->db->get('banner')->result();
          echo var_dump($banner);
          
          exit;*/
            return $this->db->get('banner')->result();
        }
      
        public function get_banner_vertical_1() {
            $this->db->select('*');
            $this->db->where(['ativo' => 1]);
            $this->db->limit(1);
            $this->db->order_by('id', 'RANDOM');
            
            /*$banner = $this->db->get('banner')->result();
          echo var_dump($banner);
          
          exit;*/
            return $this->db->get('banner')->result();
        }

        public function getDadosPortal() {

            $this->db->where('id', 1);
            return $this->db->get('config')->row();

        }

        public function getModulo() {
            $this->db->select('modulo.*, noticia.*, editores.*, categoria.*, tipo_tag.*');
            $this->db->from('modulo');
            $this->db->join('noticia','noticia.id = modulo.id_noticia','left');
            $this->db->join('editores','editores.id = noticia.id_editor','left');
            $this->db->join('categoria','categoria.id = noticia.id_categoria','left');
            $this->db->join('tipo_tag','tipo_tag.id = noticia.id_tipo_tag','left');
            $this->db->where(['destaque' => 1, 'estado' => 1, 'modulo.ativo' => 1]);

          
            return $this->db->get()->result();
          
        }


        public function getCategoriasList($id_categoria=NULL) {
            $this->db->select('noticia.*');
            $this->db->from('noticia');
            $this->db->where('noticia.id_categoria', $id_categoria);
            $this->db->order_by('noticia.id',  'DESC'); 
            $this->db->limit(9);
            return $this->db->get()->result();

        }
      
         public function getModuloIdUnic($id_noticia, $id_editor) {
        
            if( $id_noticia ) {
                $this->db->select('noticia.*, editores.nome as nome_editor');
                $this->db->from('noticia, editores');
                $this->db->where('noticia.id', $id_noticia);
                $this->db->where('editores.id', $id_editor);
                $this->db->limit(1);
                return $this->db->get()->row();
              
             //echo "<pre>"; print_r($return ); echo "</pre>"; exit;

            }
        }
    }