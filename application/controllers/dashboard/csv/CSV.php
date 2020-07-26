<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CSV extends CI_Controller {
  
    public function __construct() {
        parent::__construct();
        $this->load->model('CSV_model','csv');
    }
 
    public function index(){
 
      $this->load->view('dashboard/csv/index');
 
 }
  
 public function processa() {
   
   if(!empty($_FILES['arquivo']['tmp_name'])){
    $arquivo = new DomDocument();
      
    $arquivo->load($_FILES['arquivo']['tmp_name']);
    
    $linhas = $arquivo->getElementsByTagName("Row");
    $primeira_linha = TRUE; 
     
     // PEGANDO XML
     foreach($linhas as $linha) {
       if($primeira_linha == false){ 
         $arrayForm[] = array( 
           'id_editor'    => $linha->getElementsByTagName("Data")->item(0)->nodeValue,
           'id_categoria' => $linha->getElementsByTagName("Data")->item(1)->nodeValue,
           'id_tipo_tag'  => $linha->getElementsByTagName("Data")->item(2)->nodeValue,
           'titulo'       => $linha->getElementsByTagName("Data")->item(3)->nodeValue,
           'tag'          => $linha->getElementsByTagName("Data")->item(4)->nodeValue,
           'noticia'      => $linha->getElementsByTagName("Data")->item(5)->nodeValue,
           'ativo'        => $linha->getElementsByTagName("Data")->item(6)->nodeValue,
           'dt_cad'       => $linha->getElementsByTagName("Data")->item(7)->nodeValue,
           'img'          => $linha->getElementsByTagName("Data")->item(8)->nodeValue,
           'destaque'     => $linha->getElementsByTagName("Data")->item(9)->nodeValue,
           'estado'       => $linha->getElementsByTagName("Data")->item(10)->nodeValue,
         );
   
         
       } else {
         $primeira_linha = false;
       }
       
     }
     // ENVIANDO OS DADOS PARA SEREM GRAVADOS NO BANCO DE DADOS
     $this->csv->doInsert($arrayForm);
     
 } else {
   echo "Arquivo está vázio ou não existe";
 }
  
}
}