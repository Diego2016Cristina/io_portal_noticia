<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    // TRATAMENTO DE ERROS
  error_reporting( E_ALL & (~E_NOTICE | ~E_USER_NOTICE) );
  ini_set( 'error_log', '/public_html/application/logs/php_erros.log' );
  ini_set( 'ignore_repeated_source', true );    
  ini_set( 'ignore_repeated_errors', true );
  ini_set('display_errors', TRUE);
  ini_set( 'log_errors', true );
    #
    // FIM TRATAMENTO DE ERRO
    class Noticia_model extends CI_Model {
      
        public function getNoticias() {
            
            $this->db->select('noticia.*, editores.nome as editores, categoria.nome as categoria');
            $this->db->from('noticia');
            $this->db->join('editores','editores.id = noticia.id_editor','left');
            $this->db->join('categoria','categoria.id = noticia.id_categoria','left'); 
            return $this->db->get()->result();

        }

        //ADICIONA
        public function doInsert($dados=NULL) {
            if(is_array($dados)) {
                $this->db->insert('noticia', $dados);

                if($this->db->affected_rows() > 0) {
                    setMsg('msgCadastro', 'Notícia cadastrada com sucesso', 'sucesso');
                } else {
                    setMsg('msgCadastro', 'Ops! Tivemos um pequeno erro ao tentar cadastrar notícia.', 'erro');
                }
            }
        }

        //PEGA NOTÍCIA PELA SUA ID
        public function getNoticiaId($id_noticia= NULL) {

            if( $id_noticia ) {
                $this->db->select('noticia.*, editores.id as id_edit, editores.nome as nome_editor');
                $this->db->from('noticia, editores');
                $this->db->where('noticia.id', $id_noticia);
                $this->db->limit(1);
                return $this->db->get()->row();

            }
        }

        //FUNÇAO PARA ATUALIZAR
        public function doUpdate($dados=NULL, $id_noticia=NULL) {

            if(is_array($dados)) {

                $this->db->update('noticia', $dados, array('id' => $id_noticia));

                if($this->db->affected_rows() > 0) {
                    setMsg('msgCadastro', 'Notícia atualizada com sucesso', 'sucesso');
                } else if( $this->db->affected_rows() == 'NULL' ) {
                    setMsg('msgCadastro', 'Não ouve alteração dos dados por sua parte.', 'sucesso');
                } else {

                    setMsg('msgCadastro', 'Ops! Tivemos um pequeno erro ao tentar atualizar notícia.', 'erro');

                }

            }

        } 

        

        //GET NOME CATEGORIA PAI
        public function getCatPaiNome($id_categoria_pai = NULL) {

            if($id_categoria_pai) {

                $this->db->where('id', $id_categoria_pai);
                $this->db->limit(1);
                $query = $this->db->get('categoria')->row();

                // return @$query->nome;

                echo $query->nome;

            }
            
        }

        public function getCategorias() {

            $this->db->where('ativo', 1);
            return $this->db->get('categoria')->result();
        }

        public function getEditores() {

            $this->db->where('ativo', 1);
            return $this->db->get('editores')->result();
        }

        public function getTag() {

            $this->db->where('ativo', 1);
            return $this->db->get('tipo_tag')->result();
        }

        //APAGA UMA NOTICIA
        public function doDelete($id_noticia= NULL) {

            if( $id_noticia ) {
              
                $this->db->delete('noticia', array('id' => $id_noticia));
                
                if($this->db->affected_rows() > 0) {
                    setMsg('msgCadastro', 'Notícia apagada com sucesso', 'sucesso');
                  } else {
                    setMsg('msgCadastro', 'Ops! Tivemos um pequeno erro ao tentar apagar notícia.', 'erro');
                }

            }
        }
}