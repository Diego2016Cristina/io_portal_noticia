<style>
    .posicionado {
    top: 10px;
	position: relative;
}
.titulo {
    position: relative;
    font-weight: bold;
    color: #fff;
    left: 10px;
    top: -100px;
}

.titulo2 {
    position: relative;
    font-weight: bold;
    color: #fff;
    left: 10px;
    top: -180px;
}

.ar img {
	width: 100%;
    font-size:36px;
    opacity: 2;
    filter: alpha(opacity=30);
}
.ar img:hover {
	opacity: 0.9;
    /* filter: alpha(opacity=30); */
}
#div2 {
    position:relative;
    top: -70px;
}
</style>

<div class="row">
    <div class="col-sm-8">
        <?php foreach($not_1_div AS $n) { ?>
            <a href="#">
                <img src="<?= base_url('assets/uploads/fotos_noticias/'.$n->img); ?>" class="divs_all space img-thumbnail">
            </a>
            <div class="card-body">
                <h5 class="card-title"><?= $n->titulo ?></h5>
                <p class="card-text"><?= $n->resumo ?></p>
            </div>
        <?php } ?>
    </div>
    <div class="col-sm-4">
        <div class="row">
            <div class="col-sm-12">
                <?php foreach($not_3_div AS $n) { ?>
                    <div class="ar posicionado">
                        <img src="<?= base_url('assets/uploads/fotos_noticias/'.$n->img); ?>" alt="Ar-condicionados" title="Ar condicionados e Climatizadores"  />
                    </div>
                    <br>
                    <h4 class="titulo"><?= $n->titulo ?></h4>
                <?php } ?>
            </div>
            <div class="col-sm-12">
                <?php foreach($not_2_div AS $n) { ?>
                    <div class="ar posicionado" id="div2">
                        <img src="<?= base_url('assets/uploads/fotos_noticias/'.$n->img); ?>" alt="Ar-condicionados" title="Ar condicionados e Climatizadores"  />
                    </div>
                    <br>
                    <h4 class="titulo2"><?= $n->titulo ?></h4>
                <?php } ?>
            </div>
        </div>
    </div>
</div>