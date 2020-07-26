<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editores extends CI_Controller {
  public function __construct() {
        parent::__construct();
        $this->load->model('usuario_model','m_users');
        $this->load->model('editores_model','editores');

        if(!$this->ion_auth->logged_in()) { //Prevents access without authentication.
      redirect('sair', 'refresh');
        }
    }

    public function index() {
        $id_user = $_SESSION['user_id'];
      $perfil = $this->m_users->selecionarUsuario($id_user);
    
    foreach($perfil as $users) {
      $dados['editores']       = $this->editores->getEditores();
      $dados['bntTitulo']      = 'Atualizar';
      $dados['titulo']         = 'Listar Editores';
      $dados['titulobtn']      = 'Novo artigo';
      $dados['dt_cadastro']    = date('d/m/Y',strtotime($users->created_on));
      $dados['first_name']     = $users->first_name;
      $dados['last_name']      = $users->last_name;
      $dados['email']          = $users->email;
      $dados['photo_user']     = $users->photo_user;
      $dados['password']       = $users->password;
      $dados['group_id']       = $users->group_id;
      $dados['pagina']   = 'dashboard/editores/index.php';
    }

        $this->load->view('dashboard/home', $dados);
    }

    public function core() {

    $this->form_validation->set_rules('nome', 'nome', 'trim|required|min_length[5]');
    
    if($this->form_validation->run() == TRUE) {

      $dadosEditores['nome']  = $this->input->post('nome');
      $dadosEditores['ativo'] = $this->input->post('ativo');
      $dadosEditores['foto']  = $this->input->post('foto');

      if($this->input->post('id_editor')) {
        
        $id_editor = $this->input->post('id_editor');
        $dadosEditores['ultima_atualizacao'] = date('Y/m/d');
        $this->editores->doUpdate($dadosEditores, $id_editor);
        redirect('editores', 'refresh');

      }else {

        $this->editores->doInsert($dadosEditores);
        redirect('editores', 'refresh');
        
      }

    }else {

      $this->modulo();

    }
  }

    public function modulo($id_editor=NULL) {
        
        $data = NULL;
    $id_user = $_SESSION['user_id'];

    if(isset($id_editor)) {//Caso exista $id_editor

      if($perfil = $this->m_users->selecionarUsuario($id_user)) {
        $dados = array(
          'titulo'      => 'Atualizar editor',
          'dt_cadastro' => date('d/m/Y',strtotime($perfil[0]->created_on)),
          'first_name'  => $perfil[0]->first_name,
          'last_name'   => $perfil[0]->last_name,
          'email'       => $perfil[0]->email,
          'photo_user'  => $perfil[0]->photo_user,
          'password'    => $perfil[0]->password,
          'group_id'    => $perfil[0]->group_id,
          'dados'       => $this->editores->getEditoresId($id_editor),
          'pagina'      => 'dashboard/editores/modulo'
        );

        $this->load->view('dashboard/home', $dados);

      }
      
      if( !$dados || !$perfil ) {
        setMsg('msgCadastro', 'Editor não encontrada.', 'erro');
        redirect('editores', 'refresh');
      }

    }else if(!isset($id_editor)){//Caso não exista a variavel $id_editor

      if($perfil = $this->m_users->selecionarUsuario($id_user)) {
        $dados = array(
          'titulo' => 'Cadastrar um novo editor',
          'dt_cadastro' => date('d/m/Y',strtotime($perfil[0]->created_on)),
          'first_name'  => $perfil[0]->first_name,
          'last_name'   => $perfil[0]->last_name,
          'email'       => $perfil[0]->email,
          'photo_user'  => $perfil[0]->photo_user,
          'password'    => $perfil[0]->password,
          'group_id'    => $perfil[0]->group_id,
          'dados'       => $this->editores->getEditoresId($id_editor),
          'pagina'      => 'dashboard/editores/modulo'
        );

        $this->load->view('dashboard/home', $dados);

      }
      
      if( !$dados || !$perfil ) {
        setMsg('msgCadastro', 'Editor não encontrada.');
        redirect('editores', 'refresh');
      }

    }

  }
  
  public  function del($id_editor=NULL) {

    if($id_editor) {

      $this->editores->doDelete($id_editor);
      redirect('editores', 'refresh');

    }else {
      setMsg('msgCadastro', 'Editor não encontrada.', 'erro');
      redirect('editores', 'refresh');
    }

  }

  public function upload_foto() {

    $config['upload_path']     = '../public_html/assets/uploads/fotos_editores/';
    $config['allowed_types']   = 'gif|jpg|png|jpeg';
    $config['max_size']        = 1024;
    $config['encrypt_name']    = TRUE;
    
    $this->load->library('upload', $config);

    if($this->upload->do_upload('foto_editor')) {

      //FOTO ENVIADA
      echo json_encode(array('url_img' => base_url('assets/uploads/fotos_editores/'. $this->
        upload->data('file_name')), 'nome_img' => $this->upload->data('file_name'), 
        'error' => 0));

    } else {

      //ERRO NO ENVIO
      echo "json_encode(array('msg' => $this->upload->display_errors(), 'error' => 1) )";

    }

  }
}
