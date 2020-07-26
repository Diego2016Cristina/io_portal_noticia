<div class="row" style="background-color: #fff">
  <div class="container">
    <div class="row">
      <!--Grid column-->
      <?php foreach($busca_noticia as $busca) { ?>
          <div class="col-sm-4 col-md-4 col-lg-2 mb-2">
            
            <!--Image-->
            <div class="view overlay z-depth-1-half">
              <a href="<?= base_url('site/Home/visualizar/'.$busca->id.'/'.$busca->id_categoria.'/'.$busca->id_editor); ?>" class="text-decoration-none" id="titulo_semana">
                <div class="zoom">
                  <?php if(!empty($busca->img)) { ?>
                     <img src="<?= base_url('assets/uploads/fotos_noticias/'.$busca->img); ?>" style="width: 100%; height: 150px" alt="<?= $busca->titulo ?>">
                  <?php }else { ?>
                     <div style="width: 200px; height: 150px; background: #cccccc">
                       
                     </div>
                  <?php } ?>
                </div>
                <div class="mask rgba-white-light mt-1 mb-1"><?= $busca->titulo ?></div>
              </a>
            </div>
          
        </div>
      <?php } //FIM DO FOREACH ?>
        <!--Grid row-->
    </div>
  </div>
</div>
