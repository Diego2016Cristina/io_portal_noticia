<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dados_usuario extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('usuario_model','m_users');
  }

  public function index() {
    $dados['rotuloConfg'] = 'Financial Intelligence | infomações pessoais';
    $id_user = $_SESSION['user_id'];
    $perfil = $this->m_users->selecionarUsuario($id_user);

    foreach ($perfil as $users) {
      $dados['dt_cadastro'] = date('d/m/Y',strtotime($users->created_on));
      $dados['first_name']  = $users->first_name;
      $dados['last_name']   = $users->last_name;
      $dados['email']       = $users->email;
      $dados['photo_user']  = $users->photo_user; 
      $dados['password']    = $users->password;
      $dados['group_id']    = $users->group_id;
    }

    $dados['subtitulo'] = 'Informações do usuário';
    $dados['tituloConfig'] = 'Informações pessoais';
    $dados['pagina'] = 'dashboard/config/informacao_pessoal'; // ==> Aponta para a página da informações do usuário

    $this->load->view('dashboard/home', $dados);
  }

  public function updateUser() {
    $dados_form = $this->input->post();

    $id = $_SESSION['user_id'];

    //Trabalhando o upload da imagem;
    //1º configurar a biblioteca
      $config['upload_path']   = 'assets/uploads/fotos/'; //para onde vao ser enviado esse arquivo;
      $config['allowed_types'] = 'jpg|png|gif';
      $config['encrypt_name']  = TRUE;
      
      $this->load->library('upload', $config);
      $this->upload->initialize($config);

      if($this->upload->do_upload('arquivo')) { //Verifica se o arquivo está passando algum valor

          $imagem = $this->upload->data();
          $nome_arquivo = $imagem['file_name'];

          $data = array(
          'first_name' => $dados_form['firstName'],
          'last_name'  => $dados_form['lastName'],
          'photo_user' => $nome_arquivo
           );

          $return = $this->m_users->editarUsuario($id, $data);
          redirect('inf_pessoais', 'refresh');

      } else { //se caso a variavel arquivo estiver vazia ele realiza essa operação

        if( $this->upload->do_upload('arquivo') == NULL) {
          $data = array(
          'first_name' => $dados_form['firstName'],
          'last_name' => $dados_form['lastName'],
           );

          $return = $this->m_users->editarUsuario($id, $data);
          redirect('inf_pessoais', 'refresh');

          exit();
        }

        $erro = $this->upload->display_errors();// Resgata o erro ao tentar salvar a imagem selecionada.

        setMsg('msgUpdate', 'Erro ao tentar carregar a imagem.<br>'. $erro, 'erro');

        redirect('inf_pessoais', 'refresh');

      }

  }
}