<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Usuario extends CI_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->model('usuario_model','m_users');
    }
    
    public function index() {
      $this->form_validation->set_rules('email', 'email', 'required');
      $this->form_validation->set_rules('senha', 'senha', 'required');
     
      if($this->form_validation->run() == TRUE) {
        
        
        $idenfity= $this->input->post('email');
        $password = $this->input->post('senha');
        $remember = ($this->input->post('manter_conectado') != NULL ? TRUE : FALSE);
        
        if( $this->ion_auth->login($idenfity, $password, $remember) ) {
          
          redirect('s_home', 'reflesh');
          
        } else { 
          setMsg('msgAutenticacaoUser', 'Email ou senha inválido.', 'erroLogin');
          $this->load->view('dashboard/login');
        }
        
      } else { 
        $this->load->view('dashboard/login');
      }

    }
    
    public function getUsersAll() {
      $id_user = $_SESSION['user_id'];
      $perfil  = $this->m_users->selecionarUsuario($id_user);
    
      foreach($perfil as $users) {
        $dados['titulo']      = 'Gerênciar Usuário';
        $dados['dt_cadastro'] = date('d/m/Y',strtotime($users->created_on));
        $dados['first_name']  = $users->first_name;
        $dados['last_name']   = $users->last_name;
        $dados['email']       = $users->email;
        $dados['photo_user']  = $users->photo_user;
        $dados['password']    = $users->password;
        $dados['group_id']    = $users->group_id;
      }
    
      $dados['usuario'] = $this->m_users->getUsers();
      
      $dados['pagina'] = 'dashboard/usuario/index.php';

      $this->load->view('dashboard/home', $dados);
    }
    
     public function modulo($id_usuario=NULL) {
       
       if(isset($id_usuario)) {// EDITAR 
         
         $id_usu = $_SESSION['user_id'];
         
         if($perfil = $this->m_users->selecionarUsuario($id_usu)) {
           $dados = array(
             'titulo'      => 'Editar dados do usuário',
             'dt_cadastro' => date('d/m/Y',strtotime($perfil[0]->created_on)),
             'first_name'  => $perfil[0]->first_name,
             'last_name'   => $perfil[0]->last_name,
             'email'       => $perfil[0]->email,
             'phone'       => $perfil[0]->phone,
             'photo_user'  => $perfil[0]->photo_user,
             'password'    => $perfil[0]->password,
             'group_id'    => $perfil[0]->group_id,
             'dados'       => $this->m_users->getUsersId($id_usuario),
             'pagina'      => 'dashboard/usuario/modulo'
           );
           
           $this->load->view('dashboard/home', $dados);
         }
         
         if( !$dados || !$perfil ) {
           setMsg('msgCadastro', 'Usuário não encontrado.', 'erro');
           redirect('index_usuario', 'refresh');
         }// FIM DA VERIFICAÇÃO SE FOR DIFERENTE DA VARIAVEL $DADOS OU DA VARIAVEL $PERFIL        
        
       } else {// CADASTRAR
         
         $id_usua = $_SESSION['user_id'];
         
         if($perfil = $this->m_users->selecionarUsuario($id_usua)) {
           $dados = array(
             'titulo' => 'Cadastrar um novo usuário',
             'dt_cadastro' => date('d/m/Y',strtotime($perfil[0]->created_on)),
             'first_name'  => $perfil[0]->first_name,
             'last_name'   => $perfil[0]->last_name,
             'email'       => $perfil[0]->email,
             'photo_user'  => $perfil[0]->photo_user, 
             'password'    => $perfil[0]->password,
             'group_id'    => $perfil[0]->group_id,
             'dados'       => $this->m_users->getUsersId($id_usuario),
             'pagina'      => 'dashboard/usuario/modulo'
           );
           
           $this->load->view('dashboard/home', $dados);
           
       }// FIM DA VERIFICAÇÃO SE EXISTE A VARIAVEL $ID_USUARIO
       
         if( !$dados || !$perfil ) {
           setMsg('msgCadastro', 'Usuário não encontrado.', 'erro');
           redirect('index_usuario', 'refresh');
       }
     }
    }
    
    public function core() {
      $this->form_validation->set_rules('nome', 'Nome', 'trim|required');
      $dados_form = $this->input->post();
      
      if($this->form_validation->run() == TRUE) {
          
          $password = $dados_form['senha'];
          $email = $dados_form['email'];
          $additional_data = array(
            'first_name' => $dados_form['nome'],
            'last_name' => $dados_form['sobrenome'],
          );
          
          $group = array($dados_form['tipo']); // Sets user to admin.
          $phone = $dados_form['cel'];
        
          $retorno = $this->ion_auth->register($password, $email, $additional_data, $group, $phone);
        
          if($retorno) {
            setMsg('msgCadastro', 'Usuário cadastrado com sucesso.','sucesso');
            redirect('m_usuario', 'refresh');
          }        
        
      } else {
        
        $this->modulo();
        
      }
      
    }
    
    // função sair

   public function sair() {
    $this->ion_auth->logout();

    redirect('administrator', 'refresh');
   }
  }