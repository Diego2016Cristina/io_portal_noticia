<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Editores_model extends CI_Model {

    public function getEditores() {

        return $this->db->get('editores')->result();
        
    }

    //ADICIONA NOVO EDITOR
    public function doInsert($dados=NULL) {
        if(is_array($dados)) {
            $this->db->insert('editores', $dados);

            if($this->db->affected_rows() > 0) {
                setMsg('msgCadastro', 'Editor cadastrado com sucesso', 'sucesso');
            } else {
                setMsg('msgCadastro', 'Ops! Tivemos um pequeno erro ao tentar cadastrar uma novo editor.', 'erro');
            }
        }
    }

    //PEGA UM EDITOR PELA SUA ID
    public function getEditoresId($id_editor= NULL) {

        if( $id_editor ) {

            $this->db->where('id', $id_editor);
            $query = $this->db->get('editores');
            return $query->row();

        }
    }

    //FUNÇAO PARA ATUALIZAR EDITOR
    public function doUpdate($dados=NULL, $id_editor=NULL) {

        if(is_array($dados)) {

            $this->db->update('editores', $dados, array('id' => $id_editor));

            if($this->db->affected_rows() > 0) {
                setMsg('msgCadastro', 'Editor atualizado com sucesso', 'sucesso');
            } else {
                setMsg('msgCadastro', 'Ops! Tivemos um pequeno erro ao tentar atualizar editor.', 'erro');
            }

        }

    }

    //APAGA UMA EDITOR
    public function doDelete($id_editor= NULL) {

        if( $id_editor ) {

            $this->db->delete('editores', array('id' => $id_editor));
            if($this->db->affected_rows() > 0) {
                setMsg('msgCadastro', 'Editor apagada com sucesso', 'sucesso');
            } else {
                setMsg('msgCadastro', 'Ops! Tivemos um pequeno erro ao tentar apagar editor.', 'erro');
            }

        }
    }
}