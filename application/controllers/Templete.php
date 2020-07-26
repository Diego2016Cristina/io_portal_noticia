<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Preciso passar a ideia que está no template para colocar aqui
class Templete extends CI_Controller {
  public function __construct() {
      parent::__construct();
    $this->load->model('Site_model', 'menu');
    $this->load->model('portal_model', 'portal');
    }

  public function index() {
    $query = $this->portal->getDadosPortal();
    $dados = array(
      'tituloHome'               => 'ÚLTIMAS NOTÍCIAS',
      'titulo'                   => $query->titulo,
      'dados_portal'             => $this->portal->getDadosPortal(),
      'banner_horizontal_1'      => $this->portal->get_banner_horizontal_1(),
      'banner_horizontal_2'      => $this->portal->get_banner_horizontal_2(),
      'banner_vertical_1'        => $this->portal->get_banner_vertical_1(),
      'viewHome'                 => 'site/index/home',
      'div_ultimas_noticias_top' => 'site/index/ultimas_noticias',
      'menuprincipal'            => 'site/index/menuprincipal',
      'header_topo_1'            => 'site/index/header_topo_1',
      'header_propaganda'        => 'site/index/header_propaganda',
      'header_propaganda2'       => 'site/index/header_propaganda2',
      'header_footer'            => 'site/index/header_footer',
      'destaque'                 => 'site/index/destaque',
      'viewSlideUM'              => 'site/index/slide_um',
      'categoria'                => $this->menu->getCategorias(),
      'modulo'                   => $this->portal->getModulo(),
    );
    $this->load->view('templete', $dados);
  }
}
