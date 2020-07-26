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
#titulo_semana {
    color: #666;
}
#titulo_semana:hover {
    color: #cc0000;
}
</style>
<div class="row mt-2 mb-2" style="background-color: #fff">
  <div class="col-sm-12">
   <!-- Footer -->
<footer class="page-footer font-small mdb-color lighten-3 pt-4">

  <!-- Footer Elements -->
  <div class="container">

    <!--Grid row-->
    <div class="row">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 my-4">
            <div style="font-weight: bold; border-bottom: 2px solid #dd0000">DURANTE A SEMANA</div>
          </div>
        </div>
      </div>
      <!--Grid column-->
      <?php foreach($durante_semana as $semana) { ?>
        <?php $dia_atual = date('d', strtotime($semana->dt_cad)); ?>
        <?php $dias = date('d')-7; ?>
        <?php if($dia_atual >= $dias) { ?>
            
          <div class="col-sm-4 col-md-4 col-lg-2 mb-4">

            <!--Image-->
            <div class="view overlay z-depth-1-half">
              <a href="<?= base_url('site/Home/visualizar/'.$semana->id.'/'.$semana->id_categoria.'/'.$semana->id_editor); ?>" class="text-decoration-none" id="titulo_semana">
                <div class="zoom">
                  <?php if(!empty($semana->img)) { ?>
                    <img src="<?= base_url('assets/uploads/fotos_noticias/'.$semana->img); ?>" style="width: 100%; height: 150px" alt="img-responsiva">
                  <?php }else { ?>
                    <div style="width: 100%; height: 150px; background: #cccccc">
                    
                    </div>
                  <?php } ?>
                </div>              
                <div class="mask rgba-white-light mt-1 mb-1"><?= $semana->titulo ?></div>
              </a>
            </div>

          </div>
      
        <?php } ?>
      <?php } ?>
    </div>
    <!--Grid row-->
    <!-- BOTÂO -->
    <div class="row my-5">
      <div class="col-sm-12 text-center">
        <a href="/d_semana">
         <button type="button" class="btn btn-outline-info">Ver todas da semana</button>
        </a>
      </div>
    </div>

  </div>
  <!-- Footer Elements -->

</footer>
<!-- Footer -->
  </div>
</div>

