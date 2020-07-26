<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
  class Semana extends CI_Controller {
    public function __construct() {
      parent::__construct();
      /*$this->load->model('noticia_model','noticia');*/
      $this->load->model('modulo_model','modulo');
      $this->load->model('portal_model', 'portal');
      $this->load->model('site_model', 'menu');
      $this->load->model('categoria_model','categoria');
    }
    public function index() {
      $dados = array(
        'header_topo_1'       => 'site/index/header_topo_1',
        'header_propaganda'   => '/site/index/header_propaganda',
        'menuprincipal'       => 'site/index/menuprincipal',
        'dados_portal'        => $this->portal->getDadosPortal(),
        'banner_horizontal_1' => $this->portal->get_banner_horizontal_1(),
        'banner_horizontal_2' => $this->portal->get_banner_horizontal_2(),
        'categoria'           => $this->menu->getCategorias(),
        'noticiaSemanal'      => $this->modulo->getNoticiaSemanal(),
        'home'                => '/site/durante_semana/home',
        'titulo'              => 'Durante a semana', // Vai apontar para uma pagina de erro 404 personalizada
        'viewHome'            => '/site/durante_semana/padrao',
        'header_footer'       => 'site/index/header_footer',
      );
      
      $this->load->view('templete', $dados);
    }
    
}
