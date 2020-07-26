<link rel="stylesheet" href="<?= base_url('assets/materialize/css/style.css'); ?>">
<div class="row">
    <div class="col-md-12 p-2" style="background-color: #fff">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 mt-3">
                <div class="container">
                    <p class="title_p h1" style="font-weight: bold"><?= $dados->titulo ?></p>
                    <p class="title_r"><?= $dados->resumo ?></p>
                </div> 
                <div class="row">
                    <div class="col-sm text-left mb-5">

                        <div class="col-sm-12">

                            <p class="editor_title">

                                <?= "<i class='fa fa-user' aria-hidden='true'></i> ".$dados->nome_editor." </br><i class='fa fa-calendar' aria-hidden='true'></i> ". utf8_encode(strftime('%A, %d de %B de %Y', strtotime($dados->dt_cad))); ?>

                            </p>
                        </div>

                        <div class="col-sm-12" id="espaco_noticia">
                          
                            <p class="editor_texto">
                              <div class="" id="db_noticia">
                                <?= $dados->noticia ?>
                              </div>
                            </p>
                              

                        </div>
                      
                        <div class="col-sm-12">
                          
                          <div class="col-sm-12">
                            <!-- Espaço usado para o curtir das noticias -->
                          </div>
                          
                        </div>

                    </div>
                    
                    

                </div>

            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 mt-3">
                
                <div class="container">
                    
                    <div class="row">
                        <div class="col-sm-12" style="border-bottom: 2px solid #dd0000"><span style="background-color: #dd0000; padding: 5px; float: left; color: #fff">LEIA MAIS</span></div>
                    </div>

                    <div class="row">

                        <div class="col s12 m8 offset-m2 l6 offset-l3 ">
                            
                            <?php foreach($listaCategorias as $lista) { ?><!-- SEGUNDO HEADER DIV 2 -->
                                
                                <?php if($lista->titulo == $dados->titulo) { ?>
                                    <!-- NÃO SE FAZ NADA -->
                                    <?php } else { ?>
                                        <div class="card-panel grey lighten-5 z-depth-1 mt-3">

                                        <a href="<?= base_url('site/Home/visualizar/'.$lista->id.'/'.$lista->id_categoria.'/'.$lista->id_editor); ?>" class="text-decoration-none" style="color: #666666; weight: bold">
                                            <div class="row valign-wrapper">
                                                <div class="col-xs-4">
                                                    <div class="zoom">
                                                      <?php if(!empty($lista->img)) { ?>
                                                        <img src="<?= base_url('assets/uploads/fotos_noticias/'.$lista->img); ?>" class="img-fluid opacidade-89" style="width: 100px; height: 90px;">
                                                      <?php }else { ?>
                                                        <div style="width: 100px; height: 90px; background: #cccccc">
                                                        
                                                        </div>
                                                      <?php } ?>
                                                    </div>        
                                                </div>
                                                <div class="col s10">
                                                    <span class="black-text">
                                                    <p style="font-size: 0.8em;"><?= $lista->titulo ?><br>
                                                        <span class="text-muted"><i class="fa fa-calendar-o" aria-hidden="true"></i>
                                    <?= utf8_encode(strftime('%A, %d de %B de %Y', strtotime($lista->dt_cad))); ?></span></p>
                                                    </span>
                                                </div>
                                            </div>
                                        </a>   
                                    </div>

                                <?php }//FIM DO SE-NÃO-SE ?>
                                
                            <?php }//FIM DO FOREACH ?>
                        </div><!--FIM DA COLUNA -->

                    </div><!-- FIM DA ROW -->

                    <div class="row mt-3" style="background: #fffccc">
                        <div class="col-sm-12 text-center pt-2 pb-2">
                            <img src="<?= base_url('assets/img/11572865087892339562.gif') ?>" class="img-fluid">
                        </div><!-- FIM DA COLUNA -->
                    </div><!-- FIM DA ROW -->

                </div><!-- FIM CONTAINER -->
            </div> <!--FIM DA COLUNA DESSE BLOCO -->
        </div><!--FIM DA ROW DESSE BLOCO -->
    </div><!--FIM DA COLUNA PRINCIPAL -->
</div><!--FIM DA ROW PRINCIPAL -->
