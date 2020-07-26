<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/Sao_Paulo');

class Noticia extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('usuario_model','m_users');
    $this->load->model('noticia_model','noticia');
    $this->load->model('categoria_model','categoria');

    if(!$this->ion_auth->logged_in()) { //Prevents access without authentication.
      redirect('sair', 'refresh');

    }
  }
  public function index() {
    

    $id_user = $_SESSION['user_id'];
      $perfil = $this->m_users->selecionarUsuario($id_user);
    
    foreach($perfil as $users) {
      $dados['titulo'] = 'Todos as notícias';
      $dados['titulobtn'] = 'Nova notícia';
      $dados['dt_cadastro'] = date('d/m/Y',strtotime($users->created_on));
      $dados['first_name']  = $users->first_name;
      $dados['last_name']   = $users->last_name;
      $dados['email']       = $users->email;
      $dados['photo_user']  = $users->photo_user;
      $dados['password']    = $users->password;
      $dados['group_id']    = $users->group_id;
    }
    
    $dados['noticia'] = $this->noticia->getNoticias();
    $dados['pagina'] = 'dashboard/noticia/index.php';

    $this->load->view('dashboard/home', $dados);
  }

  public function core() {

    $this->form_validation->set_rules('dt_cad', 'Data cadastro', 'trim|required');
    
    if($this->form_validation->run() == TRUE) {

        $dadosNoticia['id_categoria']       = $this->input->post('id_categoriapai');
        $dadosNoticia['id_editor']          = $this->input->post('id_editor');
        $dadosNoticia['id_tipo_tag']        = $this->input->post('id_tipo_tag');
        $dadosNoticia['dt_cad']             = $this->input->post('dt_cad');
        $dadosNoticia['titulo']             = $this->input->post('titulo');
        $dadosNoticia['meta_link']          = slug($this->input->post('titulo'));
        $dadosNoticia['tag']                = $this->input->post('tag');
        $dadosNoticia['resumo']             = $this->input->post('resumo');
        $dadosNoticia['noticia']            = $this->input->post('editor1');//notícia
        $dadosNoticia['inicio_publicacao']  = $this->input->post('inicio_publicacao');
        $dadosNoticia['fim_publicacao']     = $this->input->post('fim_publicacao');
        $dadosNoticia['estado']             = $this->input->post('estado');//Estado
        $dadosNoticia['destaque']           = $this->input->post('destaque');
        $dadosNoticia['img']                = $this->input->post('img');
        
      if($this->input->post('id_noticia')) {

        $id_noticia = $this->input->post('id_noticia');
        $dadosNoticia['ultima_atualizacao'] = dataDiaDb();
        $this->noticia->doUpdate($dadosNoticia, $id_noticia);
        redirect('noticia', 'refresh');

      }else {

        $this->noticia->doInsert($dadosNoticia);
        
        redirect('noticia', 'refresh');

      }        

    }else {

      $this->modulo();

    }
  }

  public function modulo($id_noticia=NULL) {
    
    $data = NULL;
    $id_user = $_SESSION['user_id'];

    if(isset($id_noticia)) {//ATUALIZAR NOTÍCIA

      if($perfil = $this->m_users->selecionarUsuario($id_user)) {
        $dados = array(
          'titulo'        => 'Atualizar notícia',
          'dt_cadastro'   => date('d/m/Y',strtotime($perfil[0]->created_on)),
          'first_name'    => $perfil[0]->first_name,
          'last_name'     => $perfil[0]->last_name,
          'email'         => $perfil[0]->email,
          'photo_user'    => $perfil[0]->photo_user,
          'password'      => $perfil[0]->password,
          'group_id'      => $perfil[0]->group_id,
          'dados_modulo'  => $this->noticia->getNoticiaId($id_noticia),
          'tags'          => $this->noticia->getTag(),
          'cat_pai'       => $this->noticia->getCategorias(),
          'editores'      => $this->noticia->getEditores(),
          'op_update'     => 1,//DEFINE QUE ESTOU NO ATUALIZAR OU NÃO
          'pagina'        => 'dashboard/noticia/modulo'
        );

        /*echo "<pre>";
        print_r($dados);
        echo "</pre>";

        exit;*/

        $this->load->view('dashboard/home', $dados);
      
      }

      if( !$dados || !$perfil ) {
        setMsg('msgCadastro', 'Notícia não encontrada.', 'erro');
        redirect('noticia', 'refresh');
      }

    }else if(!isset($id_noticia)){//CADASTRAR NOTÍCIA

      if($perfil = $this->m_users->selecionarUsuario($id_user)) {
        $dados = array(
          'titulo'         => 'Criar uma nova notícia',
          'dt_cadastro'    => date('d/m/Y',strtotime($perfil[0]->created_on)),
          'first_name'     => $perfil[0]->first_name,
          'last_name'      => $perfil[0]->last_name,
          'email'          => $perfil[0]->email,
          'photo_user'     => $perfil[0]->photo_user,
          'password'       => $perfil[0]->password,
          'group_id'       => $perfil[0]->group_id,
          'dados_modulo'   => $this->noticia->getNoticiaId($id_noticia),
          'cat_pai'        => $this->noticia->getCategorias(),
          'tags'           => $this->noticia->getTag(),
          'editores'       => $this->noticia->getEditores(),
          'pagina'         => 'dashboard/noticia/modulo'
        );

        $this->load->view('dashboard/home', $dados);

      }
      
      if( !$dados || !$perfil ) {
        setMsg('msgCadastro', 'Notícia não encontrada.');
        redirect('noticia', 'refresh');
      }

    }

  }

  public function visualizar($id_noticia=NULL) {
    $data = NULL;
    $id_user = $_SESSION['user_id'];

    if($perfil = $this->m_users->selecionarUsuario($id_user)) {
      $dados = array(
        'titulo'     => 'Prévia da notícia',
        'dt_cadastro'   => date('d/m/Y',strtotime($perfil[0]->created_on)),
        'first_name'   => $perfil[0]->first_name,
        'last_name'   => $perfil[0]->last_name,
        'email'     => $perfil[0]->email,
        'photo_user'   => $perfil[0]->photo_user,
        'password'     => $perfil[0]->password,
        'group_id'     => $perfil[0]->group_id,
        'dados_modulo'   => $this->noticia->getNoticiaId($id_noticia),
        'cat_pai'     => $this->noticia->getCategorias(),
        'tags'          => $this->noticia->getTag(),
        'editores'     => $this->noticia->getEditores(),
        'pagina'     => 'dashboard/dash_pagina/pagina_global'
      );
    }

    $this->load->view('dashboard/home', $dados);

  }

  public  function del($id_noticia=NULL) {

    if( $id_noticia ) {

      $this->noticia->doDelete($id_noticia);
      redirect('noticia', 'refresh');

    }else {
      setMsg('msgCadastro', 'Notícia não encontrada.', 'erro');
      redirect('noticia', 'refresh');
    }

  }

  public function upload_foto() {

    $config['upload_path']     = '../public_html/assets/uploads/fotos_noticias/';
    $config['allowed_types']   = 'gif|jpg|png|jpeg';
    $config['max_size']        = 1024;
    $config['encrypt_name']    = TRUE;
    
    $this->load->library('upload', $config);

    if($this->upload->do_upload('foto_noticia')) {
      
      
      //FOTO ENVIADA
      echo json_encode(array('url_img' => base_url('assets/uploads/fotos_noticias/'. $this->
        upload->data('file_name')), 'nome_img' => $this->upload->data('file_name'),
        'error' => 0));

    } else {

      //ERRO NO ENVIO
      echo "json_encode(array('msg' => $this->upload->display_errors(), 'error' => 1) )";

    }

  }

}
