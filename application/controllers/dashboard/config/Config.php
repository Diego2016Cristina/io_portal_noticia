<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/Sao_Paulo');

class Config extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('usuario_model','m_users');
    $this->load->model('categoria_model','categoria');
    $this->load->model('config_model','page_config');

    if(!$this->ion_auth->logged_in()) { //Prevents access without authentication.
      redirect('sair', 'refresh');

    }
  }

    public function index() {

    $this->form_validation->set_rules('titulo', 'Título', 'trim|required|min_length[6]');

    if( $this->form_validation->run() == TRUE ) {
      $dados_form = $this->input->post();

      $dados = array(

        'titulo'         => $dados_form['titulo'],
        'empresa'        => $dados_form['empresa'],
        'cep'            => $dados_form['cep'],
        'endereco'       => $dados_form['endereco'],
        'bairro'         => $dados_form['bairro'],
        'complemento'    => $dados_form['complemento'],
        'cidade'         => $dados_form['cidade'],
        'estado'         => $dados_form['estado'],
        'email'          => $dados_form['email'],
        'telefone'       => $dados_form['telefone'],
        'a_destaque'     => $dados_form['a_destaque'],
        'meta_descricao' => $dados_form['meta_descricao'],
        'dt_atualizacao' => dataDiaDb()

      );
      
      $this->page_config->doUpdate($dados, /*1 é condição*/ 1);
      redirect('config', 'reflesh');

    }else {
      
      /**
       * INDEFINIDO...
       */

    }

        $id_user = $_SESSION['user_id'];
      $perfil = $this->m_users->selecionarUsuario($id_user);
    
    foreach($perfil as $users) {
      $dados['query'] = $this->page_config->getConfig();
      $dados['bntTitulo'] = 'Atualizar';
      $dados['titulo'] = 'Configuração do Portal';
      $dados['titulobtn'] = 'Novo artigo';
      $dados['dt_cadastro'] = date('d/m/Y',strtotime($users->created_on));
      $dados['first_name']  = $users->first_name;
      $dados['last_name']   = $users->last_name;
      $dados['email']       = $users->email;
      $dados['photo_user']  = $users->photo_user;
      $dados['password']    = $users->password;
      $dados['group_id']    = $users->group_id;
      $dados['pagina'] = 'dashboard/config/index.php';
        }

        $this->load->view('dashboard/home', $dados);

    }

}