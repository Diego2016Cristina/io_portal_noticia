<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CF_home extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('usuario_model','m_users');
    $this->load->model('dashboard_model', 'dashboard');

    if(!$this->ion_auth->logged_in()) { //Prevents access without authentication.
      redirect('sair', 'refresh');

    }
  }

  public function index() {
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
    
    /*
    Array
    (
     [dt_cadastro] => 25/04/2020
     [first_name] => Canal
     [last_name] => de noticias
     [email] => diegoxavierti2@outlook.com
     [photo_user] => 4accc699ef8bc9e5b43764b5c830d4d7.jpg
     [password] => $2y$08$hjGw8tPMh1DUnFVWRv752.1hwsEm6FA9vGvAcocqVzggAKNdWaLsO
     [group_id] => 1
    )
    */

    $dados['rotuloHome'] = 'Fullstack.info | Home';
    $dados['tituloHome'] = '';
    // DADOS PARA PREENCHER A PÁGINA INIIAL(pg_inicial) COM AS INFORMAÇÕES NECESSARIAS
    $dados['t_categoria'] = $this->dashboard->getTotal('categoria');
    $dados['t_noticia'] = $this->dashboard->getTotal('noticia');
    $dados['noticia'] = $this->dashboard->getNoticia('noticia');
    // FIM
    $dados['dashboard']   = 'dashboard/pg_inicial';

    //Busca todas as informações do usuario logado.
    //$user = $this->ion_auth->user()->row();

    // $this->session->set_userdata("usar", $user);

    $this->load->view('dashboard/home', $dados);
    
    
    /*echo "<pre>";
    print_r($user);
    echo "</pre>";
    
    exit;*/
  }
}