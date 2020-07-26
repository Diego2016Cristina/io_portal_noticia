<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * MODEL PARA PAGINA CONFIGURAÇÃO
 */
class Exibicao_model extends CI_Model {
    
    public function getModulo() {
        $this->db->select('modulo.*, noticia.titulo, editores.nome as editores, categoria.nome as categoria');
        $this->db->from('modulo');
        $this->db->join('noticia','noticia.id = modulo.id_noticia','left');
        $this->db->join('editores','editores.id = noticia.id_editor','left');
        $this->db->join('categoria','categoria.id = noticia.id_categoria','left');
        $this->db->order_by('modulo.id_noticia', 'DESC');
        $this->db->where(['destaque' => 1, 'estado' => 1]);
        return $this->db->get()->result();
    }

    //PEGAR ID
    public function getModuloId($id_modulo= NULL) {

        if( $id_modulo ) {

            $this->db->where('id', $id_modulo);
            $this->db->limit(1);
            return $this->db->get('modulo')->row();

        }
    }
    //SELECIONAR
    public function getNoticias() {
        
        $this->db->select('noticia.*, editores.nome as editores, categoria.nome as categoria');
        $this->db->from('noticia');
        $this->db->join('editores','editores.id = noticia.id_editor','left');
        $this->db->join('categoria','categoria.id = noticia.id_categoria','left');
        $this->db->order_by('noticia.id', 'DESC');
        $this->db->where(['destaque' => 1, 'estado' => 1]);
        //$return = $this->db->get()->result();
        //echo "<pre>"; print_r($return); echo "</pre>"; exit;
        return $this->db->get()->result();

    }

    //INSERIR
    public function doInsert($dados=NULL) {

        if(is_array($dados)) {
            $this->db->insert('modulo', $dados);

            if($this->db->affected_rows() > 0) {
                setMsg('msgCadastro', 'modulo salvo com sucesso', 'sucesso');
            } else {
                setMsg('msgCadastro', 'Ops! Tivemos um pequeno erro ao tentar salvar um novo modulo.', 'erro');
            }
        }
        
    }

    //ATUALIZAÇÃO
    public function doUpdate($dados=NULL, $condicao=NULL) {

        if( is_array($dados) && $condicao ) {

            $this->db->update('modulo', $dados, array('id' => $condicao));

            if($this->db->affected_rows() > 0) {

                setMsg('msgCadastro', 'Os dados foram atualizado com sucesso.', 'sucesso');

            } else {

                setMsg('msgCadastro', 'Erro ao tentar atualizar os dados.', 'erro');

            }

        }

    }

    //EXCLUSÃO
    public function doDelete($id_modulo= NULL) {

        if( $id_modulo ) {

            $this->db->delete('modulo', array('id' => $id_modulo));
            if($this->db->affected_rows() > 0) {
                setMsg('msgCadastro', 'Modulo apagado com sucesso', 'sucesso');
            } else {
                setMsg('msgCadastro', 'Ops! Tivemos um pequeno erro ao tentar apagar modulo.', 'erro');
            }

        }
    }
}