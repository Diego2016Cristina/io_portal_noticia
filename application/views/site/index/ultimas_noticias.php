<div class="row" style="background-color: #fff" >
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 mt-3"><!-- PRIMEIRO HEADER DIV 1 -->
        <?php foreach($modulo as $m) { ?>
            <?php if($m->posicao_index == 1 && $m->locais_div == 1) { ?>
                <div>
                    <a href="<?= base_url('site/Home/visualizar/'.$m->id_noticia.'/'.$m->id_categoria.'/'.$m->id_editor); ?>" class="img_central text-decoration-none" title="<?= $m->resumo ?>">
                    <div class="zoom">
                        <img style="filter: opacity(54%); -webkit-filter:opacity(100%);" src="<?= base_url('assets/uploads/fotos_noticias/'.$m->img); ?>" alt="Responsive image">
                    </div>
                    <div id="tag"><span class="badge <?= $m->tipo ?>"><?= $m->tag ?></span></div>
                    <div id="titulomaior">
                        <?= mb_strimwidth("$m->titulo", 0, 200, "..."); ?>. 
                        <!--<small><i class="fa fa-clock-o" aria-hidden="true"></i>
                        <?= date('d/m/Y', strtotime($m->dt_cad)); ?></small>-->
                    </div>
                  </a>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 mt-3">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 box_header_1 overflow-hidden"><!-- PRIMEIRO HEADER DIV 2 -->
                <?php foreach($modulo as $m) { ?>
                    <?php if($m->posicao_index == 1 && $m->locais_div == 2) { ?>
                        <a href="<?= base_url('site/Home/visualizar/'.$m->id_noticia.'/'.$m->id_categoria.'/'.$m->id_editor); ?>" title="<?= $m->titulo ?>" class="text-decoration-none">
                        <div class="zoom">
                            <img src="<?= base_url('assets/uploads/fotos_noticias/'.$m->img); ?>" class="img_foto" alt="Responsive image">
                        </div>
                            <div class="tag_img_small"><span class="badge <?= $m->tipo ?>"><?= $m->tag ?></span></div>
                            <div class="titulomenor mb-5">
                                <?= mb_strimwidth("$m->titulo", 0, 88, "..."); ?>
                                <!-- <small><i class="fa fa-clock-o" aria-hidden="true"></i>
                                <?= date('d/m/Y', strtotime($m->dt_cad)); ?></small> -->
                            </div>
                        </a>
                    <?php } ?>
                <?php } ?>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 box_header_1 overflow-hidden"><!-- PRIMEIRO HEADER DIV 3 -->
                <?php foreach($modulo as $m) { ?>
                    <?php if($m->posicao_index == 1 && $m->locais_div == 3) { ?>
                        <a href="<?= base_url('site/Home/visualizar/'.$m->id_noticia.'/'.$m->id_categoria.'/'.$m->id_editor); ?>" title="<?= $m->titulo ?>" class="text-decoration-none">
                        <div class="zoom">
                            <img src="<?= base_url('assets/uploads/fotos_noticias/'.$m->img); ?>" class="img_foto" alt="Responsive image">
                        </div>
                            <div class="tag_img_small"><span class="badge <?= $m->tipo ?>"><?= $m->tag ?></span></div>
                            <div class="titulomenor">
                                <?= mb_strimwidth("$m->titulo", 0, 88, "..."); ?>
                                <!--<small><i class="fa fa-clock-o" aria-hidden="true"></i>
                                <?= date('d/m/Y', strtotime($m->dt_cad)); ?></small>-->
                            </div>
                        </a>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 box_header_1 overflow-hidden"><!-- PRIMEIRO HEADER DIV 4 -->
                <?php foreach($modulo as $m) { ?>
                    <?php if($m->posicao_index == 1 && $m->locais_div == 4) { ?>
                        <a href="<?= base_url('site/Home/visualizar/'.$m->id_noticia.'/'.$m->id_categoria.'/'.$m->id_editor); ?>" title="<?= $m->titulo ?>" class="text-decoration-none">
                        <div class="zoom">
                            <img src="<?= base_url('assets/uploads/fotos_noticias/'.$m->img); ?>" class="img_foto" alt="Responsive image">
                        </div>
                            <div class="tag_img_small"><span class="badge <?= $m->tipo ?>"><?= $m->tag ?></span></div>
                            <div class="titulomenor">
                                <?= mb_strimwidth("$m->titulo", 0, 88, "..."); ?>
                                <!--<small><i class="fa fa-clock-o" aria-hidden="true"></i>
                                <?= date('d/m/Y', strtotime($m->dt_cad)); ?></small>-->
                            </div>
                        </a>
                    <?php } ?>
                <?php } ?>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 box_header_1 overflow-hidden"><!-- PRIMEIRO HEADER DIV 5 -->
                <?php foreach($modulo as $m) { ?>
                    <?php if($m->posicao_index == 1 && $m->locais_div == 5) { ?>
                        <a href="<?= base_url('site/Home/visualizar/'.$m->id_noticia.'/'.$m->id_categoria.'/'.$m->id_editor); ?>" title="<?= $m->titulo ?>" class="text-decoration-none">
                        <div class="zoom">
                            <img src="<?= base_url('assets/uploads/fotos_noticias/'.$m->img); ?>" class="img_foto" alt="Responsive image">
                        </div>
                            <div class="tag_img_small"><span class="badge <?= $m->tipo ?>"><?= $m->tag ?></span></div>
                            <div class="titulomenor">
                                <?= mb_strimwidth("$m->titulo", 0, 88, "..."); ?>
                                <!--<small><i class="fa fa-clock-o" aria-hidden="true"></i>
                                <?= date('d/m/Y', strtotime($m->dt_cad)); ?></small>-->
                            </div>
                        </a>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>