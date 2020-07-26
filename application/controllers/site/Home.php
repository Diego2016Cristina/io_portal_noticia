<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('modulo_model','modulo');
    $this->load->model('Site_model', 'menu');
    $this->load->model('portal_model', 'portal');
    // $this->load->model('categoria_model','categoria');
    }

  public function index() {
    $dados = array(
      'viewHome' => 'site/home',
    );

    $this->load->view('site/home', $dados);
  }

  public function visualizar($id_noticia=NULL, $id_categoria=NULL, $id_editor=NULL) {
      $query = $this->portal->getDadosPortal();
      
      $dados = array(
        'header_topo_1'       => '/site/index/header_topo_1',
        'menuprincipal'       => '/site/index/menuprincipal',
        'header_propaganda'   => '/site/index/header_propaganda',
        'header_segundo'      => '/site/secundaria/header_segundo',
        'home'                => '/site/secundaria/home',
        'header_footer'       => 'site/index/header_footer',
        'modulo'              => $this->portal->getModulo(),
        'dados_portal'        => $this->portal->getDadosPortal(),
        'banner_horizontal_1' => $this->portal->get_banner_horizontal_1(),
        'banner_horizontal_2' => $this->portal->get_banner_horizontal_2(),
        'banner_vertical_1'   => $this->portal->get_banner_vertical_1(),
        'dados'               => $this->modulo->getModuloId($id_noticia, $id_editor),
        'categoria'           => $this->menu->getCategorias(),
        'listaCategorias'     => $this->portal->getCategoriasList($id_categoria),
        'unicaCat'            => $this->portal->getModuloIdUnic($id_noticia, $id_editor),
        'durante_semana'      => $this->modulo->getSemana(),
        'tags'                => $this->modulo->getTag(),
        'viewPageSecundaria'  => '/site/secundaria/pagina_padrao',//Página com a notícia completa(PAGINA SECUNDARIA).
      );
    
     /*echo "<pre>";
      print_r($dados['durante_semana']);
    echo "</pre>";
    
    exit; */

    $this->load->view('templete', $dados);
    
  }

}
