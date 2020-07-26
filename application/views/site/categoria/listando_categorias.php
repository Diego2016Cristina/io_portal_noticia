<style>
.zoom {
  overflow: hidden;
  width: 100%;
  background-color: transparent;
  cursor: pointer;
}

.zoom img {
  max-width: 100%;
  -moz-transition: all 0.3s;
  -webkit-transition: all 0.3s;
  transition: all 0.3s;
}

.zoom:hover img {
  -moz-transform: scale(1.1);
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}
</style>

<div class="row mb-2" style="background-color: #fff">
  <div class="col-sm-12 col-md-8 col-lg-8">
    <div class="row">
      <?php foreach($listaCategorias as $lista) { ?>
      <div class="col-sm-6 col-md-12 col-lg-6">
        <a href="<?= base_url('site/Home/visualizar/'.$lista->ID_NOTICIA.'/'.$lista->ID_CATEGORIA.'/'.$lista->id_editor); ?>" class="text-decoration-none" title="<?= $lista->titulo ?>">
          <div class="card mb-4">
            <div class="zoom">
               <?php if(!empty($lista->img)) { ?>
                  <img src="<?= base_url('assets/uploads/fotos_noticias/'.$lista->img); ?>" class="card-img-top" alt="..." style="height: 200px; ">
               <?php }else { ?>
                  <div style="width: 100%; height: 200px; background: #cccccc">
                      
                  </div>
               <?php } ?>              
            </div>
            <div class="card-body">
              <p class="card-text text-dark"><?= $lista->titulo ?></p>
            </div>
          </div>
        </a>
      </div>
      <?php } ?>
    </div>
  </div>
  <div class="col-sm-12 col-md-4 col-lg-4">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12">
          <div class="row">
            <div class="col-sm-12">
              <div style="font-weight: bold; border-bottom: 2px solid #dd0000">Recomendações para você</div>
            </div>
          </div>
        
        <div class="overflow-auto" style="height: 900px;">
         <?php foreach($listaCategorias as $lista) { ?>
             <a href="<?= base_url('site/Home/visualizar/'.$lista->ID_NOTICIA.'/'.$lista->ID_CATEGORIA.'/'.$lista->id_editor); ?>" class="text-decoration-none" title="<?= $lista->titulo ?>">
              <p class="lead mb-2 pt-2 pb-2 text-dark" style="position: relative; border-bottom: 1px solid #999999; font-size: 1.0em">
                <?= $lista->resumo ?>
              </p>
             </a>
         <?php } ?>
        </div>
        
      </div>
    </div>
  </div>
</div>
