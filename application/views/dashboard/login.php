<!DOCTYPE html>
  <html>
    <head>
      <meta name="viewport" content="width=device-width, user-scalable=no">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/font-awesome/css/font-awesome.min.css'); ?>" />
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.css'); ?>"/>

      <!-- Formatando letra --> 
      <style type="text/css">body { font-family: Arial, sans-serif !important; }</style>

      <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/login.css'); ?>"/>

      <script type="text/javascript">
        window.onload = function() {

            document.getElementById('email').focus();

        }
          setTimeout(function() {
            $(".mark").fadeOut().empty();
          }, 5000);      
      </script>

    <style>
      body {
        background-image: url('<?= base_url('assets/img/images.jpg'); ?>');
        background-position: center;
        background-attachment: fixed;
        background-repeat: no-repeat;
        -webkit-background-size: 100% 100%;
        -moz-background-size: 100% 100%;
        -o-background-size: 100% 100%;
        background-size: 100% 100%; 
      }
      .bloco-superior, a {
        background: #003366;
        padding: 10px;
        color: #fff;
      }
      .bloco-inferior {
        position: relative;
        top: 20px;
        background: #003366;
        padding: 10px;
        color: #fff;
      }
      .card {
        position: relative;
        margin: 0 auto;
        margin-top: 100px;
        width: 400px;
       -webkit-box-shadow: 0px 4px 7px rgba(50, 50, 50, 0.80);
        -moz-box-shadow:    0px 4px 7px rgba(50, 50, 50, 0.80);
        box-shadow:         0px 4px 7px rgba(50, 50, 50, 0.80); 
      }
      .card-content {
        padding: 10px;
        margin-bottom: -4px;
      }
      @media(max-width: 478px) {
        .card {
          position: absolute;
          margin-top: 0;
          width: 100%; 
          background: #fff;
        }
      }

      html {
        font-size: 1.0rem;
      }

      @media (max-width: 478px) {
        html {
          font-size: 1.1rem;
        }
      }

    </style>
    </head>

    <body>        
      <div class="card">
        <div class="form-group bloco-superior">
          <h5><strong>DASHBOARD</strong> - Área restrita</h5>
          <label id="text-0001">Entre com seus dados cadastrado.</label>
        </div>
        <div class="card-content">
          <?php echo validation_errors('<div class="alert alert-danger mark" role="alert">', '</div>'); ?>
          <?php getMsg('msgAutenticacaoUser'); ?>
          <form action="autenticarUsuario" method="post">
            <div class="mb-2">
              <label for="email">Email</label>
              <input class="form-control" id="email" name="email" value="<?= @$emailUser ?>">
            </div>
              <div class="mb-1">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha">
              </div>
              <p>
                <label>
                  <input type="checkbox" checked="checked" name="manter_conectado" />
                  <span>Relembrar-me</span>
                </label>
              </p>
              <div class="form-field">
                <button class="btn btn-success" type="submit" name="action">Acessar
                  <i class="fa fa-paper-plane" aria-hidden="true"></i>
                </button>
                <a href="http://localhost/financialintelligence.com.br/home" class="btn btn-danger">Cancelar</a>
              </div>
          </form>
        </div>
        <div class="form-group bloco-inferior">
          <a href="#" class="text-decoration-none">Esqueceu a senha?</a> |
          <a href="home" class="text-decoration-none">Retornar ao site</a>
        </div>
      </div>
      
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/jquery.min.js'); ?>"></script>
      <script type="text/javascript" src="<?php echo base_url('assets/materialize/js/materialize.min.js'); ?>"></script>
    </body>
  </html>