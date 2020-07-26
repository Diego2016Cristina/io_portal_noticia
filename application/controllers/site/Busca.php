<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
class Busca extends CI_Controller {
  
  public function __construct() {
   
   parent::__construct();
    $this->load->model('noticia_model','noticia');
    $this->load->model('site_model', 'menu');
    $this->load->model('portal_model', 'portal');
    $this->load->model('select_categorias_model', 'sel_cat');
    $this->load->model('categoria_model','categoria');
    $this->load->model('busca_model','busca');
  
  }
  public function index($meta_link=NULL) {
    
    $this->form_validation->set_rules('query_busca', 'Buscar', 'trim|required');
    
    if($this->form_validation->run() == TRUE) {
      
      $dados['header_topo_1']       = 'site/index/header_topo_1';
      $dados['menuprincipal']       = 'site/index/menuprincipal';
      $dados['listando_categorias'] = '/site/categoria/listando_categorias';
      $dados['header_propaganda']   = '/site/index/header_propaganda';
      $dados['resultado_busca']     = '/site/busca/resultado_busca';
      $dados['busca']               = '/site/busca/busca';
      $dados['qtdBusca']            = $this->busca->qtdBusca($this->input->post('query_busca'));
      $dados['header_footer']       = 'site/index/header_footer';
      $dados['categoria']           = $this->menu->getCategorias();
      $dados['dados_portal']        = $this->portal->getDadosPortal();
      $dados['banner_horizontal_1'] = $this->portal->get_banner_horizontal_1();
      $dados['banner_horizontal_2'] = $this->portal->get_banner_horizontal_2();
      $dados['busca_noticia']       = $this->busca->getBusca($this->input->post('query_busca'));
      $dados['viewPageSecundaria']  = '/site/busca/pagina_padrao';
      
      $this->load->view('templete', $dados);
    
    } else {
      
      redirect('/', 'refresh');
    
    }
    
    
  }
}