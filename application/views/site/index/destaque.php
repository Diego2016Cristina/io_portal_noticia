<link rel="stylesheet" href="<?= base_url('assets/materialize/css/style.css'); ?>">
<div class="row">
    <div class="col-sm-12 col-md-8 my-2" style="background-color: #fff; border-right: 8px solid #f5f5f5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 my-4">
                  <div class="row">
                    <div class="col-sm-4">
                      <div style="font-weight: bold; border-bottom: 2px solid #dd0000">DESTAQUES</div>
                    </div>
                    <div class="col-sm-8">
                      <!-- Search form -->
                      <form action="<?php echo base_url('busca'); ?>" method="post">
                        <div class="input-group md-form form-sm form-2 pl-0">
                          <input class="form-control my-0 py-1 border border-danger" name="query_busca" type="text" placeholder="Buscar..." aria-label="Buscar" title="Buscar notícia">
                          <div class="input-group-append">
                            <button class="input-group-text bg-danger border border-danger lighten-3" id="basic-text1"><i class="fas fa-search text-grey"
                              aria-hidden="true"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>        
                </div>
            </div>
        </div>
        <div class="row mb-3"><!-- SEGUNDO HEADER DIV 1 -->
            
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <?php foreach($modulo as $m) { ?>
                        <?php if($m->posicao_index == 2 && $m->locais_div == 1) { ?>
                            <a href="<?= base_url('site/Home/visualizar/'.$m->id_noticia.'/'.$m->id_categoria.'/'.$m->id_editor); ?>" class="text-decoration-none" title="<?= $m->titulo ?>">
                            <div class="card mb-3" style="border:none">
                            
                                <div class="zoom">
                                  <?php if(!empty($m->img)) { ?>
                                    <img class="card-img-top opacidade-89" src="<?= base_url('assets/uploads/fotos_noticias/'.$m->img); ?>" alt="Card image cap">
                                  <?php }else { ?>
                                    <div style="width: 100%; height: 250px; background: #cccccc">
                                    
                                    </div>
                                  <?php } ?>
                                </div>
                            
                                <div class="card-body">
                                    <h5 class="card-title" id="titulo_header2_div1"><?= $m->titulo ?></h5>
                                    <p class="card-text" id="resumo_header2_div1"><?= $m->resumo ?></p>
                                    <p class="card-text"><small class="text-muted"><i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?= utf8_encode(strftime('%A, %d de %B de %Y', strtotime($m->dt_cad))); ?></small>  <span class="badge <?= $m->tipo ?>"><?= $m->tag ?></span></p>
                                </div>
                            </div>
                            </a>
                        <?php } ?>
                    <?php } ?>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 corpo">
                    <?php foreach($modulo as $m) { ?><!-- SEGUNDO HEADER DIV 2 -->
                        <?php if($m->posicao_index == 2 && $m->locais_div == 2) { ?>
                            <div class="card-panel grey lighten-5 z-depth-1 mb-2">
                                <a href="<?= base_url('site/Home/visualizar/'.$m->id_noticia.'/'.$m->id_categoria.'/'.$m->id_editor); ?>" class="text-decoration-none" style="color: #666666; weight: bold" title="<?= $m->titulo ?>">
                                    <div class="row valign-wrapper">
                                        <div class="col-xs-4">
                                            <div class="zoom">
                                              <?php if(!empty($m->img)) { ?>
                                                <img src="<?= base_url('assets/uploads/fotos_noticias/'.$m->img); ?>" class="img-fluid" style="width: 100px; height: 90px;">
                                              <?php }else { ?>
                                                <div style="width: 100px; height: 90px; background: #cccccc">
                                                
                                                </div>
                                              <?php } ?>
                                            </div>   
                                        </div>
                                        <div class="col s10">
                                            <span class="black-text">
                                            <p class="fontpequena"><?= mb_strimwidth("$m->titulo", 0, 60, " ")."</br>" ?>
                                                <small class="text-muted"><i class="fa fa-calendar-o" aria-hidden="true"></i>
                                    <?= utf8_encode(strftime('%A, %d de %B de %Y', strtotime($m->dt_cad))); ?></small></p>
                                            </span>
                                        </div>
                                    </div>
                                </a>   
                            </div>
                        <?php } ?>
                    <?php } ?>

                    <?php foreach($modulo as $m) { ?><!-- SEGUNDO HEADER DIV 3 -->
                        <?php if($m->posicao_index == 2 && $m->locais_div == 3) { ?>
                            <div class="card-panel grey lighten-5 z-depth-1 mb-2">
                                <a href="<?= base_url('site/Home/visualizar/'.$m->id_noticia.'/'.$m->id_categoria.'/'.$m->id_editor); ?>" class="text-decoration-none" style="color: #666666; weight: bold" title="<?= $m->titulo ?>">
                                    <div class="row valign-wrapper">
                                        <div class="col-xs-4">
                                            <div class="zoom">
                                              <?php if(!empty($m->img)) { ?>
                                                <img src="<?= base_url('assets/uploads/fotos_noticias/'.$m->img); ?>" class="img-fluid" style="width: 100px; height: 90px;">
                                              <?php }else { ?>
                                                <div style="width: 100px; height: 90px; background: #cccccc">
                                                
                                                </div>
                                              <?php } ?>
                                            </div>     
                                        </div>
                                        <div class="col s10">
                                            <span class="black-text">
                                            <p class="fontpequena"><?= mb_strimwidth("$m->titulo", 0, 60, " ")."</br>" ?>
                                                <small class="text-muted"><i class="fa fa-calendar-o" aria-hidden="true"></i>
                                    <?= utf8_encode(strftime('%A, %d de %B de %Y', strtotime($m->dt_cad))); ?></small></p>
                                            </span>
                                        </div>
                                    </div>
                                </a>   
                            </div>
                        <?php } ?>
                    <?php } ?>

                    <?php foreach($modulo as $m) { ?><!-- SEGUNDO HEADER DIV 4 -->
                        <?php if($m->posicao_index == 2 && $m->locais_div == 4) { ?>
                            <div class="card-panel grey lighten-5 z-depth-1 mb-4">
                                <a href="<?= base_url('site/Home/visualizar/'.$m->id_noticia.'/'.$m->id_categoria.'/'.$m->id_editor); ?>" class="text-decoration-none" style="color: #666666; weight: bold" title="<?= $m->titulo ?>">
                                    <div class="row valign-wrapper">
                                        <div class="col-xs-4">
                                            <div class="zoom">
                                              <?php if(!empty($m->img)) { ?>
                                                <img src="<?= base_url('assets/uploads/fotos_noticias/'.$m->img); ?>" class="img-fluid" style="width: 100px; height: 90px;">
                                              <?php }else { ?>
                                                <div style="width: 100px; height: 90px; background: #cccccc">
                                                
                                                </div>
                                              <?php } ?>
                                            </div>      
                                        </div>
                                        <div class="col s10">
                                            <span class="black-text">
                                            <p class="fontpequena"><?= mb_strimwidth("$m->titulo", 0, 60, " ")."</br>" ?>
                                                <small class="text-muted"><i class="fa fa-calendar-o" aria-hidden="true"></i>
                                    <?= utf8_encode(strftime('%A, %d de %B de %Y', strtotime($m->dt_cad))); ?></small></p>
                                            </span>
                                        </div>
                                    </div>
                                </a>   
                            </div>
                        <?php } ?>
                    <?php } ?>

                    <?php foreach($modulo as $m) { ?><!-- SEGUNDO HEADER DIV 5 -->
                        <?php if($m->posicao_index == 2 && $m->locais_div == 5) { ?>
                            <div class="card-panel grey lighten-5 z-depth-1 mb-2">
                                <a href="<?= base_url('site/Home/visualizar/'.$m->id_noticia.'/'.$m->id_categoria.'/'.$m->id_editor); ?>" class="text-decoration-none" style="color: #666666; weight: bold" title="<?= $m->titulo ?>">
                                    <div class="row valign-wrapper">
                                        <div class="col-xs-4">
                                            <div class="zoom">
                                              <?php if(!empty($m->img)) { ?>
                                                <img src="<?= base_url('assets/uploads/fotos_noticias/'.$m->img); ?>" class="img-fluid" style="width: 100px; height: 90px;">
                                              <?php }else { ?>
                                                <div style="width: 100px; height: 90px; background: #cccccc">
                                                
                                                </div>
                                              <?php } ?>
                                            </div>     
                                        </div>
                                        <div class="col s10">
                                            <span class="black-text">
                                            <p class="fontpequena"><?= mb_strimwidth("$m->titulo", 0, 60, " ")."</br>" ?>
                                                <small class="text-muted"><i class="fa fa-calendar-o" aria-hidden="true"></i>
                                    <?= utf8_encode(strftime('%A, %d de %B de %Y', strtotime($m->dt_cad))); ?></small></p>
                                            </span>
                                        </div>
                                    </div>
                                </a>   
                            </div>
                        <?php } ?>
                    <?php } ?>
                    
                </div>
          
               <!-- INICIO DO + HEADER -->
          
               <div class="album py-5 mt-5" style="border-top: 8px solid #f5f5f5; background-color: #fff">
                 <div class="container">
                   <div class="container">
                     <div class="row">
                       <div class="col-sm-12 my-4">
                         <div style="font-weight: bold; border-bottom: 2px solid #dd0000">+ INFORMAÇÕES</div>
                       </div>
                     </div>
                   </div>
                   <div class="row">
                     <?php foreach($modulo as $m) { ?>
                     <?php if( $m->posicao_index == 2 && $m->locais_div == 6 )  { ?><!-- INICIO DIV 6 -->
                     <div class="col-md-4">
                       <a href="<?= base_url('site/Home/visualizar/'.$m->id_noticia.'/'.$m->id_categoria.'/'.$m->id_editor); ?>" class="text-decoration-none">
                       <div class="card mb-4 shadow-sm">
                         <div class="zoom">
                           <?php if(!empty($m->img)) { ?>
                           <img src="<?= base_url('assets/uploads/fotos_noticias/'.$m->img); ?>" class="img-fluid" style="width:100%; height:180px">
                           <?php }else { ?>
                           <div style="width: 100px; height: 90px; background: #cccccc">
                             
                           </div>
                           <?php } ?>
                         </div>
                         <div class="card-body" style="height: 176px">
                           <p class="card-text fontpequena" style="height: 118px">
                             <?= mb_strimwidth("$m->titulo", 0, 100, " ") ?>
                           </p>
                           <span class="badge <?= $m->tipo ?>" style="position: relative;left: -20px; top: 0px; border-radius: 0px; padding:5px"><?= $m->tag ?></span>
                         </div>
                       </div>
                       </a>
                     </div>
                     <?php } ?><!-- FIM DO IF FIM DIV 6 -->
                     
                     <?php if( $m->posicao_index == 2 && $m->locais_div == 7 )  { ?><!-- INICIO DIV 7 -->
                     <div class="col-md-4">
                       <a href="<?= base_url('site/Home/visualizar/'.$m->id_noticia.'/'.$m->id_categoria.'/'.$m->id_editor); ?>" class="text-decoration-none" />
                       <div class="card mb-4 shadow-sm">
                         <div class="zoom">
                           <?php if(!empty($m->img)) { ?>
                           <img src="<?= base_url('assets/uploads/fotos_noticias/'.$m->img); ?>" class="img-fluid" style="width:100%; height:180px">
                           <?php }else { ?>
                           <div style="width: 100px; height: 90px; background: #cccccc">
                             
                           </div>
                           <?php } ?>
                         </div>
                          <div class="card-body" style="height: 176px">
                           <p class="card-text fontpequena" style="height: 118px">
                             <?= mb_strimwidth("$m->titulo", 0, 100, " ") ?>
                           </p>
                            <!-- <small class="text-muted">9 mins</small> -->
                            <span class="badge <?= $m->tipo ?>" style="position: relative;left: -20px; top: 0px; border-radius: 0px; padding:5px"><?= $m->tag ?></span>
                         </div>
                       </div>
                       </a>
                     </div>
                     <?php } ?><!--FIM DO IF FIM DIV 7 -->
                     
                     <?php if( $m->posicao_index == 2 && $m->locais_div == 8 )  { ?><!-- INICIO DIV 8 -->
                     <div class="col-md-4">
                       <a href="<?= base_url('site/Home/visualizar/'.$m->id_noticia.'/'.$m->id_categoria.'/'.$m->id_editor); ?>" class="text-decoration-none">
                       <div class="card mb-4 shadow-sm">
                         <div class="zoom">
                           <?php if(!empty($m->img)) { ?>
                             <img src="<?= base_url('assets/uploads/fotos_noticias/'.$m->img); ?>" class="img-fluid" style="width:100%; height:180px">
                           <?php }else { ?>
                             <div style="width: 100px; height: 90px; background: #cccccc">
                             
                             </div>
                           <?php } ?>
                         </div>
                          <div class="card-body" style="height: 176px">
                           <p class="card-text fontpequena" style="height: 118px">
                             <?= mb_strimwidth("$m->titulo", 0, 100, " ") ?>
                           </p>
                            <!-- <small class="text-muted">9 mins</small> -->
                            <span class="badge <?= $m->tipo ?>" style="position: relative;left: -20px; top: 0px; border-radius: 0px; padding:5px"><?= $m->tag ?></span>
                         </div>
                       </div>
                       </a>
                     </div>
                     <?php } ?><!--FIM DO IF FIM DIV 8 -->
                     
                     <?php } ?><!-- FIM DO FOREACH -->              
                   </div><!-- FIM DO ROW -->
                   
                   <div class="row"><!-- INICIO DA SEGUNDA ROW --> 
                     <?php foreach($modulo as $m) { ?>
                     <?php if( $m->posicao_index == 2 && $m->locais_div == 9 )  { ?><!-- INICIO DIV 9 -->
                     <div class="col-md-4">
                       <a href="<?= base_url('site/Home/visualizar/'.$m->id_noticia.'/'.$m->id_categoria.'/'.$m->id_editor); ?>" class="text-decoration-none">
                       <div class="card mb-4 shadow-sm">
                         <div class="zoom">
                           <?php if(!empty($m->img)) { ?>
                           <img src="<?= base_url('assets/uploads/fotos_noticias/'.$m->img); ?>" class="img-fluid" style="width:100%; height:180px">
                           <?php }else { ?>
                           <div style="width: 100px; height: 90px; background: #cccccc">
                             
                           </div>
                           <?php } ?>
                         </div>
                          <div class="card-body" style="height: 176px">
                           <p class="card-text fontpequena" style="height: 118px">
                             <?= mb_strimwidth("$m->titulo", 0, 100, " ") ?>
                           </p>
                            <!-- <small class="text-muted">9 mins</small> -->
                            <span class="badge <?= $m->tipo ?>" style="position: relative;left: -20px; top: 0px; border-radius: 0px; padding:5px"><?= $m->tag ?></span>
                         </div>
                       </div>
                       </a>
                     </div>
                     <?php } ?><!--FIM DO IF FIM DIV 9 -->
                     
                     <?php if( $m->posicao_index == 2 && $m->locais_div == 10 )  { ?><!-- INICIO DIV 10 -->
                     <div class="col-md-4">
                       <a href="<?= base_url('site/Home/visualizar/'.$m->id_noticia.'/'.$m->id_categoria.'/'.$m->id_editor); ?>" class="text-decoration-none">
                       <div class="card mb-4 shadow-sm">
                         <div class="zoom">
                           <?php if(!empty($m->img)) { ?>
                           <img src="<?= base_url('assets/uploads/fotos_noticias/'.$m->img); ?>" class="img-fluid" style="width:100%; height:180px">
                           <?php }else { ?>
                           <div style="width: 100px; height: 90px; background: #cccccc">
                             
                           </div>
                           <?php } ?>
                         </div>
                          <div class="card-body" style="height: 176px">
                           <p class="card-text fontpequena" style="height: 118px">
                             <?= mb_strimwidth("$m->titulo", 0, 100, " ") ?>
                           </p>
                            <!-- <small class="text-muted">9 mins</small> -->
                            <span class="badge <?= $m->tipo ?>" style="position: relative;left: -20px; top: 0px; border-radius: 0px; padding:5px"><?= $m->tag ?></span>
                         </div>
                       </div>
                       </a>
                     </div>
                     <?php } ?><!--FIM DO IF FIM DIV 10 -->
                     
                     <?php if( $m->posicao_index == 2 && $m->locais_div == 11 )  { ?><!-- INICIO DIV 11 -->
                     <div class="col-md-4">
                       <a href="<?= base_url('site/Home/visualizar/'.$m->id_noticia.'/'.$m->id_categoria.'/'.$m->id_editor); ?>" class="text-decoration-none">
                       <div class="card mb-4 shadow-sm">
                         <div class="zoom">
                           <?php if(!empty($m->img)) { ?>
                           <img src="<?= base_url('assets/uploads/fotos_noticias/'.$m->img); ?>" class="img-fluid" style="width:100%; height:180px">
                           <?php }else { ?>
                           <div style="width: 100px; height: 90px; background: #cccccc">
                             
                           </div>
                           <?php } ?>
                         </div>
                          <div class="card-body" style="height: 176px">
                           <p class="card-text fontpequena" style="height: 118px">
                             <?= mb_strimwidth("$m->titulo", 0, 100, " ") ?>
                           </p>
                            <!-- <small class="text-muted">9 mins</small> -->
                            <span class="badge <?= $m->tipo ?>" style="position: relative;left: -20px; top: 0px; border-radius: 0px; padding:5px"><?= $m->tag ?></span>
                         </div>
                       </div>
                       </a>
                     </div>
                     <?php } ?><!--FIM DO IF FIM DIV 11 -->
                     
                     <?php } ?><!-- FIM DO FOREACH -->              
                   </div><!-- FIM DO ROW -->
              
                 </div><!-- FIM DO CONTAINER -->
               </div><!-- FIM DO ALBUM -->
          
          <!-- FIM DO + HEADER -->
           
                  
            <!-- </div> -->
        </div>
    </div>
    <div class="col-sm-12 col-md-4 my-2">
        
        <div class="row pb-5 mb-2" style="background-color: #fff;">
            <div class="container"><!-- TERCEIRO HEADER DIV 1 (REDES SOCIAIS) -->
                <div class="row">
                    <div class="col-sm-12 my-4">
                    <div id="fb-root"></div>
                      <!-- ESPAÇO FAN PAGE -->
                      <script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v6.0"></script>
                      <div class="fb-page" data-href="https://www.facebook.com/canaldenoticiasonline" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="https://www.facebook.com/canaldenoticiasonline" class="fb-xfbml-parse-ignore">
                          <a href="https://www.facebook.com/canaldenoticiasonline">Canal de Noticias Online</a>
                        </blockquote>
                      </div>
                  
                  </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="row">
                    <?php foreach($modulo as $m) { ?>
                        <?php if($m->posicao_index == 3 && $m->locais_div == 1) { ?>
                            <div class="col-sm-12"><?= $m->redessociais ?></div>
                            <div class="col-sm-12"><?= $m->redessociais ?></div>
                            <div class="col-sm-12"><?= $m->redessociais ?></div>
                            <div class="col-sm-12"><?= $m->redessociais ?></div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="row" style="background-color: #fff;">
            <div class="col-sm-12 text-center mt-2 mb-2"><!-- TERCEIRO HEADER DIV 2 (PUBLICIDADE) -->
              <?php foreach( $banner_horizontal_2 as $banner ) { ?>
                <?php if( $banner->tipo == 2 ) { ?>
                  <a href="<?= $banner->link ?>" title="<?= $banner->titulo ?>" target="_blank">
                    <img src="<?= base_url().'assets/uploads/fotos_banner/'.$banner->img_banner ?>" class="img-fluid" alt="Imagem responsiva" />
                  </a>
                <?php } ?> 
              <?php } ?>
            </div>
        </div>

    </div>
</div>