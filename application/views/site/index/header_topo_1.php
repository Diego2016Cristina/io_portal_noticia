<style>
     
  @media (min-width: 514px) {
   #titulo_topo-max-514 {
    background: #fff;
    color: #000;
    font-weight: bold;
    font-family: "ghotam", sans-serif;
    padding: 5px;
    font-size: 2.4em;
    display: inline-block;
   }
  #titulo_topo-min-515 {
    background: #dd0000;
    padding: 5px;
    display: none;
   }
  
  }
     
  @media (max-width: 515px) {
  #titulo_topo-max-514 {
    background: #000;
    padding: 5px;
    display: none;
   }
   #titulo_topo-min-515 {
    background: #000;
    padding: 5px;
   }
  }  
</style>

<header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white"><!-- SOBRE --></h4>
          <p class="text-muted"><!-- ESPAÇO RESERVADO PARA QUEM SOMOS --></p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Nós também estamos no</h4>
          <ul class="list-unstyled">
            <li><a href="https://www.facebook.com/canaldenoticiasonline" target="_blank" class="text-white">Facebook</a></li>
            <li><a href="https://instagram.com/canaldenoticiasonline?igshid=1f15m6q53we07" target="_blank" class="text-white">Instagram</a></li>
            <li><a href="https://twitter.com/noticias092" target="_blank" class="text-white">Twitter</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="<?php echo base_url('/'); ?>" id="titulo_topo-max-514" class="navbar-brand">
        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="mr-2" viewBox="0 0 24 24" focusable="false"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg> -->
        <strong><?= $dados_portal->titulo ?><span style="font-weight: 200"> ONLINE</span></strong>
      </a>
      <a class="navbar-brand" href="<?php echo base_url('/'); ?>" id="titulo_topo-min-515">NOTÍCIAS ONLINE</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>
