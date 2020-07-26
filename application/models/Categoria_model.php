<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Categoria_model extends CI_Model {
        public function getCategorias() {

            return $this->db->get('categoria')->result();
            
        }

        //LISTA CATEGORIAS PAI
        public function getCatPai() {
            $this->db->where('id_categoriapai', NULL);
            return $this->db->get('categoria')->result();
        }

        //GET NOME CATEGORIA PAI
        public function getCatPaiNome($id_categoria_pai = NULL) {

            if($id_categoria_pai) {

                $this->db->where('id', $id_categoria_pai);
                $this->db->limit(1);
                $query = $this->db->get('categoria')->row();

                return @$query->nome;

            }
            
        }

        //ADICIONA NOVA CATEGORIA
        public function doInsert($dados=NULL) {
            if(is_array($dados)) {
                $this->db->insert('categoria', $dados);

                if($this->db->affected_rows() > 0) {
                    setMsg('msgCadastro', 'Categoria cadastrada com sucesso', 'sucesso');
                } else {
                    setMsg('msgCadastro', 'Ops! Tivemos um pequeno erro ao tentar cadastrar uma nova categoria.', 'erro');
                }
            }
        }

        //FUNÇAO PARA ATUALIZAR CATEGORIA
        public function doUpdate($dados=NULL, $id_categoria=NULL) {

            if(is_array($dados)) {

                $this->db->update('categoria', $dados, array('id' => $id_categoria));

                if($this->db->affected_rows() > 0) {
                    setMsg('msgCadastro', 'Categoria atualizado com sucesso', 'sucesso');
                } else {
                    setMsg('msgCadastro', 'Ops! Tivemos um pequeno erro ao tentar atualizar uma nova categoria.', 'erro');
                }

            }

        }

        //APAGA UMA CATEGORIA
        public function doDelete($id_categoria= NULL) {

            if( $id_categoria ) {

                $this->db->delete('categoria', array('id' => $id_categoria));
                if($this->db->affected_rows() > 0) {
                    setMsg('msgCadastro', 'Categoria apagada com sucesso', 'sucesso');
                } else {
                    setMsg('msgCadastro', 'Ops! Tivemos um pequeno erro ao tentar apagar uma categoria.', 'erro');
                }

            }
        }

        //PEGA UMA CATEGORIA PELA SUA ID
        public function getCategoriaId($id_categoria= NULL) {

            if( $id_categoria ) {

                $this->db->where('id', $id_categoria);
                $query = $this->db->get('categoria');
                return $query->row();

            }
        }
    }