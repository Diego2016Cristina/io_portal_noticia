<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config_exibicao extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('usuario_model','m_users');
    $this->load->model('exibicao_model','exibicao');

    if(!$this->ion_auth->logged_in()) { //Prevents access without authentication.
      redirect('sair', 'refresh');

    }
  }

  public function index() {
    $id_user = $_SESSION['user_id'];
      $perfil = $this->m_users->selecionarUsuario($id_user);
    
    foreach($perfil as $users) {
      $dados['titulo'] = 'Configurando modo de exibição';
      $dados['titulobtn'] = 'Novo';
      $dados['dt_cadastro'] = date('d/m/Y',strtotime($users->created_on));
      $dados['first_name']  = $users->first_name;
      $dados['last_name']   = $users->last_name;
      $dados['email']       = $users->email;
      $dados['photo_user']  = $users->photo_user;
      $dados['password']    = $users->password;
      $dados['group_id']    = $users->group_id;
    }
    
    $dados['modulo'] = $this->exibicao->getModulo();
    $dados['pagina'] = 'dashboard/exibicao/index.php';

    $this->load->view('dashboard/home', $dados);
  }

  public function core() {

    if($this->input->post('id_modulo')) {
      
      $id_modulo = $this->input->post('id_modulo');
      $dadosModulo['mod_tipo']           = $this->input->post('mod_tipo');
      $dadosModulo['posicao_index']      = $this->input->post('posicao_index');
      $dadosModulo['locais_div']         = $this->input->post('locais_div');
      $dadosModulo['id_noticia']         = $this->input->post('id_noticia');
      $dadosModulo['ativo']              = $this->input->post('ativo');
      $dadosModulo['ultima_atualizacao'] = date('Y/m/d');
      $this->exibicao->doUpdate($dadosModulo, $id_modulo);
      redirect('index_exibicao', 'refresh');

    }else {

      $dados_form = $this->input->post();
      $this->exibicao->doInsert($dados_form);
      redirect('index_exibicao', 'refresh');
      
    }

  }


  public function modulo($id_modulo=NULL) {
    
    $data = NULL;
    $id_user = $_SESSION['user_id'];

    if(isset($id_modulo)) {//ATUALIZAR MODULO

      if($perfil = $this->m_users->selecionarUsuario($id_user)) {
        $dados = array(
          'titulo'        => 'Atualizar modulo',
          'btnTitulo'     => 'Atualizar',
          'dt_cadastro'   => date('d/m/Y',strtotime($perfil[0]->created_on)),
          'first_name'    => $perfil[0]->first_name,
          'last_name'     => $perfil[0]->last_name,
          'email'         => $perfil[0]->email,
          'photo_user'    => $perfil[0]->photo_user,
          'password'      => $perfil[0]->password,
          'group_id'      => $perfil[0]->group_id,
          'dados'         => $this->exibicao->getModuloId($id_modulo),
          'modulo'        => $this->exibicao->getModulo(),
          'noticia'       => $this->exibicao->getNoticias(),
          'op_update'     => 1,//DEFINE QUE ESTOU NO ATUALIZAR OU NÃO
          'pagina'        => 'dashboard/exibicao/modulo'
        );

        $this->load->view('dashboard/home', $dados);
      
      }

      if( !$dados || !$perfil ) {
        setMsg('msgCadastro', 'Modulo não encontrado.', 'erro');
        redirect('index_exibicao', 'refresh');
      }

    }else if(!isset($id_modulo)){//CADASTRAR NOTÍCIA
      if($perfil = $this->m_users->selecionarUsuario($id_user)) {
        $dados = array(
          'titulo'       => 'Cadastrar um novo modulo',
          'btnTitulo'    => 'Salvar',
          'dt_cadastro'  => date('d/m/Y',strtotime($perfil[0]->created_on)),
          'first_name'   => $perfil[0]->first_name,
          'last_name'    => $perfil[0]->last_name,
          'email'        => $perfil[0]->email,
          'photo_user'   => $perfil[0]->photo_user,
          'password'     => $perfil[0]->password,
          'group_id'     => $perfil[0]->group_id,
          'dados'        => $this->exibicao->getModuloId($id_modulo),
          'modulo'       => $this->exibicao->getModulo(),
          'noticia'      => $this->exibicao->getNoticias(),
          'op_update'    => 1,//DEFINE QUE ESTOU NO ATUALIZAR OU NÃO
          'pagina'       => 'dashboard/exibicao/modulo'
        );

        $this->load->view('dashboard/home', $dados);
      
      }
    }
  }

  public function del($id_modulo=NULL) {//Delete da pagina 

    if($id_modulo) {

      $this->exibicao->doDelete($id_modulo);
      redirect('index_exibicao', 'refresh');

    }else {
      setMsg('msgCadastro', 'Modulo não encontrado.', 'erro');
      redirect('index_exibicao', 'refresh');
    }

  }
}