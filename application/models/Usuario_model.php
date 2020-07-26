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
class Usuario_model extends CI_Model {
  
  function selecionarUsuario($user_id = NULL) {
     if(isset($user_id)) {
       $this->db->select('users.*, users_groups.group_id');
       $this->db->from('users_groups');
       $this->db->join('users','users.id = users_groups.user_id','left');
       $this->db->where('users.id', $user_id);
       
       return $this->db->get()->result();
       
     }
  }
   
  function getUsers() {
      
      $this->db->distinct();
      $this->db->select('users_groups.group_id, users.*');
      $this->db->from('users_groups');
      $this->db->join('users','users.id = users_groups.user_id','left'); 
      $query = $this->db->get()->result();
    
      return $query;

  }

  public function getUsersId($id_usuario= NULL) { 
        if( $id_usuario ) {
            
            $this->db->select('users.*, users_groups.group_id');
            $this->db->from('users_groups, users');
            $this->db->where('users_groups.user_id', $id_usuario);
            $this->db->limit(1);
            return $this->db->get()->row();
 
        }
    }
  
  function editarUsuario ($user_id = NULL, $dados = NULL) {//Atualiza os dados do usuário
    
    if( is_array($dados) && $user_id ) {

      $this->db->update('users', $dados, array('id' => $user_id));

      if($this->db->affected_rows() > 0 ) {

        setMsg('msgUpdate', 'Seu dados foram atualizado com sucesso', 'sucesso');

      } else {

        setMsg('msgUpdate', 'Erro ao tentar atualizar seus dados.', 'erro');

      }
    }
  }
}
