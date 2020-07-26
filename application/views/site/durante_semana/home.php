<section>
  <div class="row pt-3 mb-2" style="background-color: #fff">
  <div class="col-sm-8 mb-3">
    <h1><?= $titulo ?></h1>
  </div>
  <div class="col-sm-12 col-md-8 col-lg-8">
    <div class="row">
      <?php foreach($noticiaSemanal  as $n) { ?>
      <div class="col-sm-6 col-md-12 col-lg-6">
        <a href="<?= base_url('site/Home/visualizar/'.$n->id.'/'.$n->id_categoria.'/'.$n->id_editor); ?>" class="text-decoration-none" title="<?= $n->titulo ?>">
          <div class="card mb-4">
            <div class="zoom">
              <?php if(!empty($n->img)) { ?>
                     <img src="<?= base_url('assets/uploads/fotos_noticias/'.$n->img); ?>" class="card-img-top" alt="..." style="height: 200px; ">
                  <?php }else { ?>
                     <div style="width: 100%; height: 200px; background: #cccccc">
                      
                     </div>
                  <?php } ?>
              </div>
            <div class="card-body">
              <p class="card-text text-dark"><?= $n->titulo ?></p>
            </div>
          </div>
        </a>
      </div>
      <?php } ?>
    </div>
  </div>
</div>
</section>
