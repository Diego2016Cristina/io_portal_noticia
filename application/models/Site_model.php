<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Site_model extends CI_Model {
        // public function getDadosSite() {//Falta criar o config controller
        //     $this->db->where('id', 1);
        //     return $this->db->get('config')->row();
        // }

        public function getCategorias() {
            $this->db->where(['ativo' => 1, 'id_categoriapai' => NULL]);
            return $this->db->get('categoria')->result();
        }

        public function getSubCategoria($id_categoria=NULL) {
            if( $id_categoria ) {

                $this->db->where(['ativo' => 1, 'id_categoriapai' => $id_categoria]);
                return $this->db->get('categoria')->result();

            }else {

                return false;

            }
        }
    }