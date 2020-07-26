<?php foreach( $banner_horizontal_2 as $banner ) { ?>
 <?php if( $banner->tipo == 3 ) { ?>
  <div class="row">
    <div class="col text-center mt-2 p-4" style="background-color: #fff">
      <a href="<?= $banner->link ?>" title="<?= $banner->titulo ?>" target="_blank">
            <img src="<?= base_url().'assets/uploads/fotos_banner/'.$banner->img_banner ?>" class="img-fluid" alt="Imagem responsiva" />
      </a>   
    </div>
  </div>
 <?php } // FIM DO IF ?>
<?php } // FIM DO FOREACH ?>
