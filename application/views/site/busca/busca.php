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
<div class="row mb-2" style="background-color: #fff">
  <div class="col-sm-12">
   <!-- Footer -->
  <footer class="page-footer font-small mdb-color lighten-3">

    <!-- Footer Elements -->
    <div class="container">

      <!--Grid row-->
      <div class="row">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 my-4">
              <div style="font-weight: bold; border-bottom: 2px solid #dd0000">RESULTADO: [ <?= $this->input->post('query_busca'); ?> ][<?= $qtdBusca ?>]</div>
            </div>
          </div>
        </div>

    </div>
    <!-- Footer Elements -->

  </footer>
<!-- Footer -->
  </div>
</div>
