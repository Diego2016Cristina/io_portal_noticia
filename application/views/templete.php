<?php 
  setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
   date_default_timezone_set('America/Sao_Paulo');
?>
<!DOCTYPE html">
<html>
  <head>
    <title><?= @$unicaCat->titulo ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <link rel="shortcut icon" href="<?= base_url('assets/img/logo.png'); ?>" type="image/x-icon"/>
    
    <link rel="canonical" href="<?= base_url('site/Home/visualizar/'.@$unicaCat->id.'/'.@$unicaCat->id_categoria.'/'.@$unicaCat->id_editor); ?>"/>
    <meta property="og:url"          content="<?= base_url('site/Home/visualizar/'.@$unicaCat->id.'/'.@$unicaCat->id_categoria.'/'.@$unicaCat->id_editor); ?>">
    <meta property="og:type"         content="article" /> 
    <meta property="og:description"  content="<?= @$unicaCat->resumo ?>" />
    <meta property="og:image"        content="<?= base_url('assets/uploads/fotos_noticias/'.@$unicaCat->img); ?>">
    
     <!-- GOOGLE ADS Anuncio -->
    <script async src="https://securepubads.g.doubleclick.net/tag/js/gpt.js"></script>
      <script>
        window.googletag = window.googletag || {cmd: []};
        googletag.cmd.push(function() {
          googletag.defineSlot('/21799500428/20canaldenoticiasonline', [728, 90], 'gpt-passback').addService(googletag.pubads());
          googletag.enableServices(); 
        });
      </script>
      
    <!-- GOOGLE ADSENSE -->
    <script data-ad-client="ca-pub-7105897398252769" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    
    
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">

    <!-- Create style default -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/header1_style.css'); ?>">
    <!-- DEFAULT -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/default.css'); ?>">
    <!-- DESTAQUE -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/destaque.css'); ?>">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css/dashboard.css'); ?>" rel="stylesheet">
   
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-170580810-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      
      gtag('config', 'UA-170580810-1');
      
    </script>
    
    </head>
    
  <body>
   <!-- Conteúdo da página -->
        <?php //Verificando qual a página vai subir.

          if(isset($viewHome)) { $this->load->view($viewHome); } 

          else if(isset($viewPageSecundaria)) { $this->load->view($viewPageSecundaria); } 

          else { 

            echo "<html>
                    <div id='preloader'>
                        <div id='status'></div>
                    </div>

                    <h1>O erro 404 é um código de resposta HTTP que indica que o cliente pôde comunicar com o servidor, mas ou o servidor não pôde encontrar o que foi pedido, ou foi configurado para não cumprir o pedido e não revelar a razão, ou a página não existe mais.</h1>

                    <script type='text/javascript'>
                      
                        $(window).on('load', function () { 
                            $('#status').fadeOut(); 
                            $('#preloader').delay(350).fadeOut('slow'); 
                            $('body').delay(350).css({'overflow': 'visible'});
                        });
                      
                    </script>
                  </html>
            "; 
          }
        
        ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>