<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comentario extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('usuario_model','m_users');
        $this->load->model('comentario_model','comentario');

        if(!$this->ion_auth->logged_in()) { //Prevents access without authentication.
         redirect('sair', 'refresh');
        }
    }

    public function index() {
        $id_user = $_SESSION['user_id'];
        $perfil  = $this->m_users->selecionarUsuario($id_user);
    
    foreach($perfil as $users) {
      $dados['titulo'] = 'Gerênciar comentários';
      $dados['dt_cadastro'] = date('d/m/Y',strtotime($users->created_on));
      $dados['first_name']  = $users->first_name;
      $dados['last_name']   = $users->last_name;
      $dados['email']       = $users->email;
      $dados['photo_user']  = $users->photo_user;
      $dados['password']    = $users->password;
      $dados['group_id']    = $users->group_id;
    }
    
    $dados['comentario'] = $this->comentario->getComentario();
    $dados['pagina'] = 'dashboard/comentario/index.php';

    $this->load->view('dashboard/home', $dados);
  }
  
  public function modulo($id_comentario=NULL) {
    if($id_comentario) {
      
      $data = $this->comentario->getComentarioId($id_comentario);
      
      if(!$data) {
        setMsg('msgCadastro', 'Erro! Comentário não encontrado', 'erro');
        redirect('comentario', 'refresh');
      }
      
      $id_user = $_SESSION['user_id'];
      $perfil  = $this->m_users->selecionarUsuario($id_user);
    
      foreach($perfil as $users) {
        $dados['titulo']      = 'Alterando e liberando comentário';
        $dados['dt_cadastro'] = date('d/m/Y',strtotime($users->created_on));
        $dados['first_name']  = $users->first_name;
        $dados['last_name']   = $users->last_name;
        $dados['email']       = $users->email;
        $dados['photo_user']  = $users->photo_user;
        $dados['password']    = $users->password;
        $dados['group_id']    = $users->group_id;
      }
      
      $dados['dados']  = $data;
      $dados['pagina'] = 'dashboard/comentario/modulo.php';
      
      $this->load->view('dashboard/home', $dados);
      
    } else {
      
      setMsg('msgCadastro', 'Erro! Comentário não encontrado', 'erro');
      redirect('comentario', 'refresh');
    }
  }
  
  public function core($id_comentario=NULL) {
    
    $this->form_validation->set_rules('comentario','Comentario','trim|required|min_length[20]');
    
    if($this->form_validation->run() == TRUE) {
      
      $dadosComentario['comentario'] = $this->input->post('comentario');
      $dadosComentario['liberado'] = $this->input->post('liberado');
      $id_comentario = $this->input->post('id_comentario');
      
      $this->comentario->doUpdate($dadosComentario, $id_comentario);
      redirect('comentario','refresh');
      
    }else {
      
      setMsg('msgCadastro', 'Erro! Comentário não encontrado', 'erro');
      redirect('comentario', 'refresh');
      
    }
   
  } 
}