<?php 
  setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
   date_default_timezone_set('America/Sao_Paulo');
?>
<div class="row" style="background-color: #fff">
   <div class="container">
     <div class="row">
       <div class="col-sm-12 p-3 bg-danger">
         
          <h1 style="position: relative; text-align: center; color: #fff">
            <?php if(isset($get2Noticias) && $get2Noticias != NULL) { ?>
            
                <?= $get2Noticias[0]->nome ?>
            
            <?php } else if (isset($sub_cat) && $sub_cat != NULL) { ?>
              <?php foreach($sub_cat as $cat) { ?>
            
                <?= $cat->nome ?>
            
              <?php } // FIM DO FOREACH ?>
            <?php } // FIM DO ELSE ?>
          </h1>
         
       </div>
     </div>
   </div> 
   <div class="col-sm-12">
     <div class="row">
      <?php if(isset($get2Noticias) && $get2Noticias != NULL) { ?>
        <?php foreach($get2Noticias as $dois) { ?>
          <div class="col-md-6 pt-2">
            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
              <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-primary"><?= $dois->tag ?></strong>
                <h3 class="mb-0"></h3>
                <div class="mb-1 text-muted"><?= strftime('%A, %d de %B de %Y', strtotime($dois->dt_cad)) ?></div>
                <p class="card-text mb-auto"><?= $dois->titulo ?></p>
                <a href="<?= base_url('site/Home/visualizar/'.$dois->ID_NOTICIA.'/'.$dois->ID_CATEGORIA.'/'.$dois->id_editor); ?>" class="text-decoration-none" title="<?= $dois->titulo ?>">Ver notícia completa</a>
              </div>
              <div class="col-auto d-none d-lg-block">
                  <?php if(!empty($dois->img)) { ?>
                    <img src="<?= base_url('assets/uploads/fotos_noticias/'.$dois->img); ?>" alt="Responsive image" class="opacidade-89" style="width: 210px; height: 250px">
                  <?php }else { ?>
                    <div style="width: 210px; height: 250px; background: #cccccc">
                      
                    </div>
                  <?php } ?>                                  
              </div>
            </div>
         </div>
        <?php } // FIM DO FOREACH ?>


      <?php } else { // FIM DO IF ?>
        <div class="col-sm-12 my-5 text-center">
          NENHUMA NOTÍCIA RELACIONADA A ESSA CATEGORIA...
        </div>
      <?php } //FIM DO ELSE ?>
       </div>
   </div>

</div>

