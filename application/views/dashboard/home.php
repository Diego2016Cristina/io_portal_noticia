<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?php 

  if(isset($rotuloDesafio)) {//Check variable, and replace the title.

    echo "<title>".$rotuloDesafio."</title>";

  } else if(isset($rotuloHome)) {
    echo "<title>".$rotuloHome."</title>";
  }else if(@$tituloConfig) {
    echo "<title>".@$tituloConfig."</title>";
  }else {

    echo "<title>Fullstack.info | Bem-vindo(a)</title>";

  }

  $foto = $photo_user; //fetch image from database.
  
  
  ?>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/config_exibicao.css'); ?>">
  <script src="<?php echo base_url('assets/js/config_exibicao.js'); ?>"></script>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dist/css/main.css'); ?>"/>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/font-awesome/css/font-awesome.min.css'); ?>" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/ionicons.min.css'); ?>" />
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/AdminLTE.min.css'); ?>" />
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/_all-skins.min.css'); ?>">
  <!-- Plugin dataTables -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dist/data-tables/datatables.css'); ?>">
  <!-- iCheck -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/iCheck/square/green.css'); ?>" />
  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/iCheck/square/skin-blue.min.css'); ?>" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="fixed skin-purple sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <?php if(!empty($foto)) { ?>
  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url('s_home'); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>F</b>S</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>FULLSTACK.</b>info</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </a>

      <div class="navbar-custom-menu"> 
        <ul class="nav navbar-nav">
         <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo base_url('assets/uploads/fotos/'.$foto) ?>" class="user-image" alt="User Image" title="<?= $first_name." ".$last_name ?>">
                <span class="hidden-xs"><?= $first_name." ".$last_name ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  
                  <img src="<?php echo base_url('assets/uploads/fotos/'.$foto) ?>" class="img-circle" alt="User Image" title="<?= $first_name." ".$last_name ?>" style="position: relative; text-align: center;">

                  <p> 
                    <?= $first_name." ".$last_name ?>
                    <small>Membro desde <?= $dt_cadastro ?></small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="inf_pessoais" class="btn btn-default btn-flat">Informações pessoais</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?php echo base_url('sair'); ?>" class="btn btn-default btn-flat">Sair</a>
                  </div>
                </li>
              </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <a href="https://canaldenoticiasonline.com.br/inf_pessoais">
          <div class="pull-left image">
            <img src="<?php echo base_url('assets/uploads/fotos/'.$foto) ?>" class="img-circle img-responsive" alt="User Image" title="<?= $first_name." ".$last_name ?>" style="widht: 30px; height: 38px">
          </div>
        </a>
        <div class="pull-left info">
          <p><?= $first_name." ".$last_name ?></p>
          <i class="fa fa-circle text-success"></i> Online
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->

  <?php }else if(empty($foto)) { ?>
       <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url('s_home'); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>F</b>I</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Financial</b>Intelligence</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <small class="hidden-xs"><?= $first_name." ".$last_name ?></small>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <div class='img-circle'>
                    <!-- <div class=''> -->
                      <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4 rounded-circle cicle">
                          <?= $first_name[0]; ?>
                        </div>
                        <div class="col-sm-4"></div>
                      </div>
                    <!-- </div> -->
                  </div>
                  <p>
                    <?= $first_name." ".$last_name ?>
                    <small>Membro desde 05 de Junho 2019</small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="inf_pessoais" class="btn btn-default btn-flat">Informações pessoais</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?php echo base_url('sair'); ?>" class="btn btn-default btn-flat">Sair</a>
                  </div>
                </li>
              </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <div class="col-sm-4 rounded-circle cicle3">
            <?= $first_name[0]; ?>
          </div>
        </div>
        <div class="pull-left info">
          <p><?= $first_name." ".$last_name ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <?php } ?>
      <!-- sidebar menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">PRINCIPAL NAVEGAÇÃO</li>

        <li class="treeview">
          <a href="">
          <i class="fa fa-tags" aria-hidden="true"></i> <span>Categorias</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="<?php echo base_url('modulos'); ?>" title="Cadastrar uma nova categoria">
              <i class="fa fa-plus" aria-hidden="true"></i> Novo</a>
            </li>

            <li><a href="<?php echo base_url('categorias'); ?>" title="Gerênciar categorias">
              <i class="fa fa-puzzle-piece" aria-hidden="true"></i> Gerênciar</a>
            </li>
                        
          </ul>
        </li>

        <li class="treeview">
          <a href="">
          <i class="fa fa-stack-overflow" aria-hidden="true"></i> <span>Notícia</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="<?php echo base_url('noticia-modulo'); ?>" title="Publicar notícia">
            <i class="fa fa-plus" aria-hidden="true"></i> Novo</a>
            </li>

            <li><a href="<?php echo base_url('noticia'); ?>" title="Gerênciar notícias">
            <i class="fa fa-puzzle-piece" aria-hidden="true"></i> Gerênciar</a>
            </li>
          
          </ul>
        </li>
        
        <li class="treeview">
          <a href="">
          <i class="fa fa-stack-overflow" aria-hidden="true"></i> <span>CSV</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="<?php echo base_url('csv'); ?>" title="Publicar notícia">
            <i class="fa fa-plus" aria-hidden="true"></i> Envio de CSV</a>
            </li>
            
          </ul>
        </li>
        
        <li class="treeview">
          <a href="">
          <i class="fa fa-commenting-o" aria-hidden="true"></i><span>Comentários</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            
            <li><a href="<?php echo base_url('comentario'); ?>" title="Gerênciar comentários">
              <i class="fa fa-puzzle-piece" aria-hidden="true"></i> Gerênciar</a>
            </li>
                        
          </ul>
        </li>

        <li class="treeview">
          <a href="">
          <i class="fa fa-text-width" aria-hidden="true"></i> <span>Editores</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="<?php echo base_url('editores-modulo'); ?>" title="Cadastrar um novo editor">
              <i class="fa fa-plus" aria-hidden="true"></i> Novo</a>
            </li>

            <li><a href="<?php echo base_url('editores'); ?>" title="Gerênciar editores">
              <i class="fa fa-puzzle-piece" aria-hidden="true"></i> Gerênciar</a>
            </li>
                        
          </ul>
        </li>

        <li class="treeview">
          <a href="">
          <i class="fa fa-bookmark" aria-hidden="true"></i> <span>Banner</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="<?php echo base_url('m-b'); ?>" title="Cadastrar um novo banner">
            <i class="fa fa-plus" aria-hidden="true"></i> Novo</a>
            </li>

            <li><a href="<?php echo base_url('g-b'); ?>" title="Gerênciar banner">
            <i class="fa fa-puzzle-piece" aria-hidden="true"></i> Gerênciar</a>
            </li>
          
          </ul>
        </li>
        <?php if($group_id == 1) { ?>
        <li class="treeview">
          <a href="">
          <i class="fa fa-users" aria-hidden="true"></i> <span>Usuários(Em Construção)</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="<?= base_url('m_usuario'); ?>" title="Publicar notícia">
            <i class="fa fa-plus" aria-hidden="true"></i> Novo</a>
            </li>

            <li><a href="<?= base_url('index_usuario'); ?>" title="Gerênciar notícias">
            <i class="fa fa-puzzle-piece" aria-hidden="true"></i> Gerênciar</a>
            </li>
          
          </ul>
        </li>
        <?php } ?>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-cogs"></i> <span>Configurações</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('inf_pessoais'); ?>"><i class="fa fa-address-card" aria-hidden="true"></i>
Informações pessoais </a></li>
            <li><a href="<?php echo base_url('config'); ?>"><i class="fa fa-cog" aria-hidden="true"></i> Configuração do Sistema</a></li>
            <li><a href="<?php echo base_url('index_exibicao'); ?>"><i class="fa fa-cog" aria-hidden="true"></i> Configurar exibição do portal</a></li>
            <li><a href="<?php echo base_url('minhas_tabelas'); ?>"><i class="fa fa-file-text-o"></i> Termo de uso</a></li>
            <li><a href="<?php echo base_url('minhas_tabelas'); ?>"><i class="fa fa-question-circle"></i> Ajuda</a></li>
            <li><a href="<?php echo base_url('home'); ?>" target="_blank"><i class="fa fa-question-circle"></i> Ir para o site</a></li>
          </ul>
        </li>
      </ul>

    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- page content (Page header) -->

    <?php //pages created.
      if(isset($pagina)) {

        $this->load->view($pagina);

      }else {

        $this->load->view($dashboard);

      }
    ?>
    
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; <?php echo date('Y') ?> <a href="http://fullstack.info.com.br">Fullstack.info</a>.</strong> Todos os direitos reservados.
  </footer>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/bootstrap/js/jquery.min.js'); ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.js'); ?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/bootstrap/js/jquery.slimscroll.min.js'); ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/bootstrap/js/fastclick.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/bootstrap/js/adminlte.min.js'); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/bootstrap/js/demo.js'); ?>"></script>
<!-- Plugs Data-table -->
<script src="<?php echo base_url('assets/dist/data-tables/datatables.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
 <script src="<?php echo base_url('assets/bootstrap/js/icheck.min.js'); ?>"></script>
<!-- Plugin AjaxFileUpload -->
<script src="<?php echo base_url('assets/dist/ajaxfileupload/js/jquery.ajaxfileupload.js'); ?>"></script>
</body>
</html>

