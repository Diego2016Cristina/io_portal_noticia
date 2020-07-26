<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
class Categoria extends CI_Controller {
  
  public function __construct() {
   
   parent::__construct();
   $this->load->model('noticia_model','noticia');
   $this->load->model('site_model', 'menu');
   $this->load->model('portal_model', 'portal');
   $this->load->model('select_categorias_model', 'sel_cat');
   $this->load->model('categoria_model','categoria');
   
  
  }
  
  public function index() {
    $dados = array(
      'viewHome' => '/site/categoria/home',
    );

    $this->load->view('templete', $dados);
  }
  
  public function visualizar($meta_link=NULL, $id_categoria=NULL, $id_editor=NULL) {
    $query = $this->portal->getDadosPortal();
    
      $dados = array(
        'header_topo_1'       => 'site/index/header_topo_1',
        'menuprincipal'       => 'site/index/menuprincipal',
        'listando_categorias' => '/site/categoria/listando_categorias',
        'header_propaganda'   => '/site/index/header_propaganda',
        'header_footer'       => 'site/index/header_footer',
        'meta_link'           => $meta_link,
        'home'                => '/site/categoria/home',
        'banner_horizontal_1' => $this->portal->get_banner_horizontal_1(),
        'banner_horizontal_2' => $this->portal->get_banner_horizontal_2(),
        'dados_portal'        => $this->portal->getDadosPortal(),
        'categoria'           => $this->menu->getCategorias(),
        'get2Noticias'        => $this->sel_cat->get2Noticias($meta_link, $id_categoria),
        'listaCategorias'     => $this->sel_cat->getPorCategorias($meta_link, $id_categoria, $id_editor),
        'tags'                => $this->noticia->getTag(),
        'viewPageSecundaria'  => '/site/categoria/pagina_padrao',//Página com a notícia completa(PAGINA SECUNDARIA).
      );
    /*echo "<pre>";
     print_r($dados['get2Noticias'][1]->nome);
    echo "</pre>";
    
    exit; */
    $this->load->view('templete', $dados);
    
    }
    
}
