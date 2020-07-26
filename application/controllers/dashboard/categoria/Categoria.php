<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('usuario_model','m_users');
    $this->load->model('categoria_model','categoria');

    if(!$this->ion_auth->logged_in()) { //Prevents access without authentication.
      redirect('sair', 'refresh');

    }
  }

  public function index() {//Encaminha para a pagina categorias
    $id_user = $_SESSION['user_id'];
      $perfil = $this->m_users->selecionarUsuario($id_user);
    
    foreach($perfil as $users) {
      $dados['titulo'] = 'Todas as categorias';
      $dados['dt_cadastro'] = date('d/m/Y',strtotime($users->created_on));
      $dados['first_name']  = $users->first_name;
      $dados['last_name']   = $users->last_name;
      $dados['email']       = $users->email;
      $dados['photo_user']  = $users->photo_user;
      $dados['password']    = $users->password;
      $dados['group_id']    = $users->group_id;
    }
    
    $dados['categorias'] = $this->categoria->getCategorias();
    $dados['pagina'] = 'dashboard/categorias/index.php';

    $this->load->view('dashboard/home', $dados);
  }

  // vai apontar para a pagina de cadastro
  public function modulo($id_categoria=NULL) {
    
    $data = NULL;
    $id_user = $_SESSION['user_id'];

    if(isset($id_categoria)) {//Caso exista $id_categoria

      if($perfil = $this->m_users->selecionarUsuario($id_user)) {
        $dados = array(
          'titulo'      => 'Atualizar categoria',
          'dt_cadastro' => date('d/m/Y',strtotime($perfil[0]->created_on)),
          'first_name'  => $perfil[0]->first_name,
          'last_name'   => $perfil[0]->last_name,
          'email'       => $perfil[0]->email,
          'photo_user'  => $perfil[0]->photo_user,
          'password'    => $perfil[0]->password,
          'group_id'    => $perfil[0]->group_id,
          'dados'       => $this->categoria->getCategoriaId($id_categoria),
          'cat_pai'     => $this->categoria->getCatPai(),
          'pagina'      => 'dashboard/categorias/modulo'
        );

        $this->load->view('dashboard/home', $dados);

      }
      
      if( !$dados || !$perfil ) {
        setMsg('msgCadastro', 'Categoria não encontrada.');
        redirect('categorias', 'refresh');
      }

    }else if(!isset($id_categoria)){//Caso não exista a variavel $id_categoria

      if($perfil = $this->m_users->selecionarUsuario($id_user)) {
        $dados = array(
          'titulo'      => 'Criar uma nova categoria',
          'dt_cadastro' => date('d/m/Y',strtotime($perfil[0]->created_on)),
          'first_name'  => $perfil[0]->first_name,
          'last_name'   => $perfil[0]->last_name,
          'email'       => $perfil[0]->email,
          'photo_user'  => $perfil[0]->photo_user,
          'password'    => $perfil[0]->password,
          'group_id'    => $perfil[0]->group_id,
          'dados' => $this->categoria->getCategoriaId($id_categoria),
          'cat_pai' => $this->categoria->getCatPai(),
          'pagina' => 'dashboard/categorias/modulo'
        );

        $this->load->view('dashboard/home', $dados);

      }
      
      if( !$dados || !$perfil ) {
        setMsg('msgCadastro', 'Categoria não encontrada.');
        redirect('categorias', 'refresh');
      }

    }

  }

  public function core() {

    $this->form_validation->set_rules('nome', 'nome', 'trim|required|min_length[5]');
    
    if($this->form_validation->run() == TRUE) {

      /*
        Array
          (
            [nome] => categorias
            [ativo] => 1
          )
      */

      $dadosCategorias['nome']      = $this->input->post('nome');
      $dadosCategorias['meta_link'] = slug($this->input->post('nome'));
      $dadosCategorias['ativo']     = $this->input->post('ativo');

      if($this->input->post('id_categoriapai')) {
        $dadosCategorias['id_categoriapai'] = $this->input->post('id_categoriapai');
      } else {
        $dadosCategorias['id_categoriapai'] = NULL;
      }

      if($this->input->post('id_categoria')) {

        $id_categoria = $this->input->post('id_categoria');
        $dadosCategorias['ultima_atualizacao'] = date('Y/m/d');
        $this->categoria->doUpdate($dadosCategorias, $id_categoria);
        redirect('categorias', 'refresh');

      }else {

        $this->categoria->doInsert($dadosCategorias);
        redirect('modulos', 'refresh');
        
      }

    }else {

      $this->modulo();

    }
  }

  public  function del($id_categoria=NULL) {

    if($id_categoria) {

      $this->categoria->doDelete($id_categoria);
      redirect('categorias', 'refresh');

    }else {
      setMsg('msgCadastro', 'Categoria não encontrada.', 'erro');
      redirect('categorias', 'refresh');
    }

  }
}