<script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>

<section class="content">
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          
          <h3><?= $t_categoria ?></h3>

          <p>Categorias</p>

        </div>
        <div class="icon">
          <ion-icon name="albums-outline"></ion-icon>
        </div>
        <a href="<?= base_url('categorias'); ?>" class="small-box-footer">Ver categorias <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          
          <h3><?= $t_noticia ?></h3>

          <p>Notícias</p>

        </div>
        <div class="icon">
          <ion-icon name="file-tray-full-outline"></ion-icon>
        </div>
        <a href="<?= base_url('noticia'); ?>" class="small-box-footer">Ver notícias<i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          
          <h3>53</h3>

          <p>Todas as visualizações</p>

        </div>
        <div class="icon">
          <ion-icon name="eye-outline"></ion-icon>
        </div>
        <a href="#" class="small-box-footer">Ver visualizações <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          
          <h3>53</h3>

          <p>Notificações</p>

        </div>
        <div class="icon">
          <ion-icon name="information-circle-outline"></ion-icon>
        </div>
        <a href="#" class="small-box-footer">Ver notificações <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
      </div>
    </div>

  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-square" aria-hidden="true"></i> Últimas notícias</h3>
        </div>
        <div class="box-body"> 
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Id</th>
                <th>Resumo</th>
                <th>Data</th>
                <th>Imagem</th>
                <th>Status</th>
                <th>...</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($noticia as $n) { ?>
              <tr>
                <td><?= $n->id ?></td>
                <td><?= $n->resumo ?></td>
                <td><?= formatarDataV($n->dt_cad) ?></td>
                <td><img src="<?= base_url('assets/uploads/fotos_noticias/'.$n->img); ?>"/ style="height: 80px; width: 100px" alt="img-responsiva"></td>
                <td><?= ($n->estado == 1)? 'Ativo':'Inativo'; ?></td>
                <td>
                  <a href="<?= base_url('dashboard/noticia/Noticia/visualizar/'. $n->id); ?>" title="Ver notícia">
                   <ion-icon name="eye-outline" style="width: 20px;height: 80px; background-color: #F0F8FF"></ion-icon>
                  </a>
                </td>
              </tr>
              <?php } ?>
            </tbody>

          </table>
        </div>
        <div class="box-footer">
           <a href="<?= base_url('noticia'); ?>">
            <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Todos as notícias
          </a>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="box">
      <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-info-circle" aria-hidden="true"></i> Últimas notificações</h3>
        </div>
        <div class="box-body">

        </div>
        <div class="box-footer">
          <a href="#">
            <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Todos as notificações
          </a>
        </div>
      </div>
    </div>
  </div>
</section>