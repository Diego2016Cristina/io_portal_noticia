<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner_model extends CI_Model {

    //LISTAR OS BANNERS
    public function getBanner() {

        return $this->db->get('banner')->result();

    }

    //PEGA UM BANNER PELA SUA ID
    public function getBannerId($id_bannner= NULL) {

        if( $id_bannner ) {

            $this->db->where('id', $id_bannner);
            $this->db->limit(1);
            return $this->db->get('banner')->row();

        }
    }

    //CADASTRAR
    public function doInsert($dados=NULL) {
        if(is_array($dados)) {
            $this->db->insert('banner', $dados);

            if($this->db->affected_rows() > 0) {
                setMsg('msgCadastro', 'Banner adicionado com sucesso', 'sucesso');
            } else {
                setMsg('msgCadastro', 'Ops! Tivemos um pequeno erro ao tentar adicionar um banner.', 'erro');
            }
        }
    }


    //FUNÇAO PARA ATUALIZAR
    public function doUpdate($dados=NULL, $id_banner=NULL) {

        if(is_array($dados)) {

            $this->db->update('banner', $dados, array('id' => $id_banner));

            if($this->db->affected_rows() > 0) {
                setMsg('msgCadastro', 'Banner atualizado com sucesso', 'sucesso');
            } else {
                setMsg('msgCadastro', 'Ops! Tivemos um pequeno erro ao tentar atualizar banner.', 'erro');
            }

        }
    }

    //FUNÇÃO DELETAR
    public function doDelete($id_banner= NULL) {

        if( $id_banner ) {

            $this->db->delete('banner', array('id' => $id_banner));
            if($this->db->affected_rows() > 0) {
                setMsg('msgCadastro', 'Banner apagado com sucesso', 'sucesso');
            } else {
                setMsg('msgCadastro', 'Ops! Tivemos um pequeno erro ao tentar apagar banner.', 'erro');
            }

        }
    }

}