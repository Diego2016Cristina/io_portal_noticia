<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('usuario_model','m_users');
        $this->load->model('banner_model','banner');

        if(!$this->ion_auth->logged_in()) { //Prevents access without authentication.
         redirect('sair', 'refresh');
        }
    }

    public function index() {
        $id_user = $_SESSION['user_id'];
        $perfil  = $this->m_users->selecionarUsuario($id_user);
    
    foreach($perfil as $users) {
      $dados['titulo'] = 'Gerênciar banner';
      $dados['dt_cadastro'] = date('d/m/Y',strtotime($users->created_on));
      $dados['first_name']  = $users->first_name;
      $dados['last_name']   = $users->last_name;
      $dados['email']       = $users->email;
      $dados['photo_user']  = $users->photo_user;
      $dados['password']    = $users->password;
      $dados['group_id']    = $users->group_id;
    }
    
    $dados['banner'] = $this->banner->getBanner();
    $dados['pagina'] = 'dashboard/banner/index.php';

    $this->load->view('dashboard/home', $dados);
  }
  
  public function modulo($id_banner=NULL) {

    $data = NULL;
    $id_user = $_SESSION['user_id'];

    if(isset($id_banner)) {//Caso exista

      if($perfil = $this->m_users->selecionarUsuario($id_user)) {
        $dados = array(
          'titulo'      => 'Atualizar banner',
          'dt_cadastro' => date('d/m/Y',strtotime($perfil[0]->created_on)),
          'first_name'  => $perfil[0]->first_name,
          'last_name'   => $perfil[0]->last_name,
          'email'       => $perfil[0]->email,
          'photo_user'  => $perfil[0]->photo_user,
          'password'    => $perfil[0]->password,
          'group_id'    => $perfil[0]->group_id,
          'dados'       => $this->banner->getBannerId($id_banner),
          'pagina'      => 'dashboard/banner/modulo'
        );

        $this->load->view('dashboard/home', $dados);

      }
      
      if( !$dados || !$perfil ) {
        setMsg('msgCadastro', 'Banner não encontrado.', 'erro');
        redirect('g-b', 'refresh');
      }

    }else if(!isset($id_banner)){//Caso não exista

      if($perfil = $this->m_users->selecionarUsuario($id_user)) {
        $dados = array(
          'titulo' => 'Criar novo banner',
          'dt_cadastro' => date('d/m/Y',strtotime($perfil[0]->created_on)),
          'first_name'  => $perfil[0]->first_name,
          'last_name'   => $perfil[0]->last_name,
          'email'       => $perfil[0]->email,
          'photo_user'  => $perfil[0]->photo_user,
          'password'    => $perfil[0]->password,
          'group_id'    => $perfil[0]->group_id,
          'dados'       => $this->banner->getBannerId($id_banner),
          'pagina'      => 'dashboard/banner/modulo'
        );

        $this->load->view('dashboard/home', $dados);

      }
      
      if( !$dados || !$perfil ) {
        setMsg('msgCadastro', 'Banner não encontrada.');
        redirect('g-b', 'refresh');
      }

    }

  }
  
  public  function del($id_banner=NULL) {//Delete da pagina 

    if($id_banner) {

      $this->banner->doDelete($id_banner);
      redirect('g-b', 'refresh');

    }else {
      setMsg('msgCadastro', 'Banner não encontrado.', 'erro');
      redirect('g-b', 'refresh');
    }

  }
  
  public function core() {

    $this->form_validation->set_rules('titulo', 'Titulo', 'trim|required');
    
    if($this->form_validation->run() == TRUE) {
      
      /**
       * (
      *    [titulo] => Portal de Notícia do Amazonas
      *    [ativo] => 1
      *  )
       */
      $dadosBanner['titulo']     = $this->input->post('titulo');
      $dadosBanner['ativo']      = $this->input->post('ativo');
      $dadosBanner['tipo']       = $this->input->post('tipo');
      $dadosBanner['link']       = $this->input->post('link');
      $dadosBanner['img_banner'] = $this->input->post('img_banner');
      
      if($this->input->post('id_banner')) {

        $id_banner = $this->input->post('id_banner');
        $dadosBanner['ultima_atualizacao'] = date('Y/m/d');
        $this->banner->doUpdate($dadosBanner, $id_banner);
        redirect('g-b', 'refresh');

      } else {

        $this->banner->doInsert($dadosBanner);
        redirect('m-b', 'refresh');  

      }
      

    } else {

      $this->modulo();

    }

  }

  public function upload_foto() {
    
    echo "Cheguei aqui"; exit;
    
    $config['upload_path']     = '../public_html/assets/uploads/fotos_banner';
    $config['allowed_types']   = 'gif|jpg|png|jpeg';
    $config['max_size']        = 1024;
    $config['encrypt_name']    = TRUE;
    
    $this->load->library('upload', $config);

    if($this->upload->do_upload('img_banner')) {

      //FOTO ENVIADA
      echo json_encode(array('url_img' => base_url('assets/uploads/fotos_banner/'. $this->
        upload->data('file_name')), 'nome_img' => $this->upload->data('file_name'), 
        'error' => 0));

    } else {

      //ERRO NO ENVIO
      echo "json_encode(array('msg' => $this->upload->display_errors(), 'error' => 1) )";

    }

  }

}
