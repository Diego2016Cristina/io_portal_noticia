<style>
  #logo_main {
    background-image: url("<?= base_url('assets/img/logo.jpg');?>");
    width: 300px;
    height: 60px;
    background-size: cover;
  }
</style>
<div class="row">
   <div class="col-md-12 my-2 p-2" style="background-color: #fff"> 
     <nav class="navbar navbar-expand-lg navbar-light" style="border-top: 1px solid transparent; background-color: #fff">
       <a class="navbar-brand" href="/">
         <div id="logo_main"></div>           
       </a> 
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
         <span class="navbar-toggler-icon"></span>
       </button>
       
       <div class="collapse navbar-collapse" id="navbarNav">
         <ul class="navbar-nav mr-auto">
           <li class="nav-item active">
             <a class="nav-link" href="/" style="position: relative; top: -4px">Início<span class="sr-only">(página atual)</span></a>
            <li> 
           <?php foreach($categoria as $cat) {                
             $sub_cat = $this->menu->getSubCategoria($cat->id);// CRIAÇÃO DE UMA SUB CONSULTA
           ?>
           <?php if( $sub_cat ) { ?>
           <li class="dropdown nav-item font-weight-bold" style="font-size: 0.8rem;">
             <a href="" class="dropdown-toggle nav-link text-decoration-none" id="drop2" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
               <?= $cat->nome ?> <span class="caret"></span>
             </a>
             <ul class="dropdown-menu" aria-labelledby="drop2" id="subMenu">
               <?php foreach($sub_cat as $sub) { ?>
               <a href="<?= base_url('site/Categoria/visualizar/'.$sub->meta_link.'/'.$sub->id);  ?>" title="<?= $sub->nome ?>" class="text-decoration-none">
                 <li class="dropdown-item nav-item font-weight-bold" style="font-size: 0.8rem">
                   <?= $sub->nome ?>
                 </li>
               </a>
               <?php } ?>                    
             </ul>
           </li><!-- fim menu horizontal -->
           <?php }else { ?>
           
           <li class="nav-item font-weight-bold" style="font-size: 0.8rem;" ><a href="<?= base_url('site/Categoria/visualizar/'.$cat->meta_link.'/'.$cat->id);  ?>" title="<?= $cat->nome ?>" 
             class="nav-link"><?= $cat->nome ?></a></li>
           
           <?php } //FiM DA VERIFICAÇÃO DE SUB MENU ?>
           <?php } //Fim do foreach ?>
         </ul>
         <form action="<?php echo base_url('busca'); ?>" method="post" class="form-inline my-2 my-lg-0">
           <input class="form-control mr-sm-2" name="query_busca" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
           <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
         </form>
       </div>
     </nav>
     </div>
  </div>
