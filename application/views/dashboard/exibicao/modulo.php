<section class="content-header">
    <h1><?= $titulo ?></h1>

    <ol class="breadcrumb">
        <li><a href="<?= base_url(''); ?>"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active"><?= $titulo ?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">

            <div class="row margin-bottom-20" style="margin-bottom: 10px">
                <div class="col-sm-12 text-right">

                    <a href="<?php echo base_url('index_exibicao'); ?>" title="Novo" class="btn btn-success">
                        <i class="fa fa-arrow-left"></i> Voltar
                    </a>

                </div>
            </div>

            <?php 

                errosValidacao();
                getMsg('msgCadastro');

            ?>

            <form class="form-horizontal" method="post" action="<?= base_url('config_doInsert'); ?>"> 
                <div class="row">
                    <div class="col-md-12">
                        <!-- Custom Tabs -->
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_1" data-toggle="tab">Configurando páginas</a></li>
                                <li><a href="#tab_2" data-toggle="tab">Adicionando banner as páginas</a></li>                    
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    
                                    <?php 

                                    errosValidacao();
                                    getMsg('msgCadastro');

                                    ?>

                                    <form class="form-horizontal" method="post" action="<?= base_url('config_doInsert'); ?>"> 
                                        <div class="form-group"><!-- Tipo de pagina -->
                                            <label for="titulo" class="col-sm-2 control-label">Tipo de página</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name="mod_tipo">
                                                        
                                                        <?php switch($dados->mod_tipo) {
                                                            case 0: 
                                                                echo "<option value='0' selected='selected'>Página Inicial</option>";
                                                                echo "<option disabled>Página secundaria</option>";
                                                            break;
                                                            case 1:
                                                                echo "<option value='0'>Página Inicial</option>";
                                                                echo "<option disabled selected='selected'>Página secundaria</option>";
                                                            break;
                                                            case 2:
                                                                echo "<option value='0'>Redes sociais</option>";
                                                                echo "<option disabled selected='selected'>Página secundaria</option>";
                                                            break;
                                                            default:
                                                                echo "
                                                                    <option value='0'>Página Inicial</option>
                                                                    <option disabled>Página secundaria</option>
                                                                ";
                                                        }?>                                                              
                                                        
                                                    </select>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="myPosition" class="col-sm-2 control-label">Posição</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="posicao_index" id="myPosition" onchange="myFunction()">
                                                        
                                                        <?php  switch($dados->posicao_index) { 
                                                            case 1:
                                                                echo "<option value='1' selected='selected' >Posição 1</option>";
                                                                echo "<option value='2'>Posição 2</option>";
                                                                echo "<option value='3'>Posição 3</option>";
                                                                echo "<option value='4'>Posição 4</option>";
                                                            break;
                                                            case 2: 
                                                                echo "<option value='1'>Posição 1</option>";
                                                                echo "<option value='2' selected='selected'>Posição 2</option>";
                                                                echo "<option value='3'>Posição 3</option>";
                                                                echo "<option value='4'>Posição 4</option>";
                                                            break;
                                                            case 3: 
                                                                echo "<option value='1'>Posição 1</option>";
                                                                echo "<option value='2'>Posição 2</option>";
                                                                echo "<option value='3' selected='selected'>Posição 3</option>";
                                                                echo "<option value='4'>Posição 4</option>";
                                                            break;
                                                            case 4: 
                                                                echo "<option value='1'>Posição 1</option>";
                                                                echo "<option value='2'>Posição 2</option>";
                                                                echo "<option value='3'>Posição 3</option>";
                                                                echo "<option value='4' selected='selected'>Posição 4</option>";
                                                            break;
                                                            default:
                                                                echo "
                                                                <option>...</option>
                                                                <option value='1'>Posição 1</option>
                                                                <option value='2'>Posição 2</option>
                                                                <option value='3'>Posição 3</option>
                                                                <option value='4'>Posição 4</option>
                                                                
                                                                ";                                   
                                                            
                                                        }?>
                                                    </select>
                                                </div>
                                        </div><!--FIM POSIÇÃO -->
                                        <div class="form-group">
                                            <label for="myPosition" class="col-sm-2 control-label">Local</label>
                                            <div class="col-sm-10" name="locais_div" id="divUm">
                                                <select class="form-control" name="locais_div">
                                                    <?php switch($dados->locais_div) {
                                                        case 1: 
                                                           echo "<option value='1' selected='selected'>Quadro 1</option>";
                                                           echo "<option value='2' >Quadro 2</option>";
                                                           echo "<option value='3' >Quadro 3</option>";
                                                           echo "<option value='4' >Quadro 4</option>";
                                                           echo "<option value='5' >Quadro 5</option>";
                                                           echo "<option value='6' >Quadro 6</option>";
                                                           echo "<option value='7' >Quadro 7</option>";
                                                           echo "<option value='8' >Quadro 8</option>";
                                                           echo "<option value='9' >Quadro 9</option>";
                                                           echo "<option value='10'>Quadro 10</option>";
                                                           echo "<option value='11'>Quadro 11</option>";
                                                        break;
                                                        case 2:
                                                            echo "<option value='1' >Quadro 1</option>";
                                                            echo "<option value='2' selected='selected'>Quadro 2</option>";
                                                            echo "<option value='3' >Quadro 3</option>";
                                                            echo "<option value='4' >Quadro 4</option>";
                                                            echo "<option value='5' >Quadro 5</option>";
                                                            echo "<option value='6' >Quadro 6</option>";
                                                            echo "<option value='7' >Quadro 7</option>";
                                                            echo "<option value='8' >Quadro 8</option>";
                                                            echo "<option value='9' >Quadro 9</option>";
                                                            echo "<option value='10'>Quadro 10</option>";
                                                            echo "<option value='11'>Quadro 11</option>";
                                                        break;
                                                        case 3:
                                                            echo "<option value='1' >Quadro 1</option>";
                                                            echo "<option value='2' >Quadro 2</option>";
                                                            echo "<option value='3' selected='selected'>Quadro 3</option>";
                                                            echo "<option value='4' >Quadro 4</option>";
                                                            echo "<option value='5' >Quadro 5</option>";
                                                            echo "<option value='6' >Quadro 6</option>";
                                                            echo "<option value='7' >Quadro 7</option>";
                                                            echo "<option value='8' >Quadro 8</option>";
                                                            echo "<option value='9' >Quadro 9</option>";
                                                            echo "<option value='10'>Quadro 10</option>";
                                                            echo "<option value='11'>Quadro 11</option>";
                                                        break;
                                                        case 4:
                                                            echo "<option value='1' >Quadro 1</option>";
                                                            echo "<option value='2' >Quadro 2</option>";
                                                            echo "<option value='3' >Quadro 3</option>";
                                                            echo "<option value='4' selected='selected'>Quadro 4</option>";
                                                            echo "<option value='5' >Quadro 5</option>";
                                                            echo "<option value='6' >Quadro 6</option>";
                                                            echo "<option value='7' >Quadro 7</option>";
                                                            echo "<option value='8' >Quadro 8</option>";
                                                            echo "<option value='9' >Quadro 9</option>";
                                                            echo "<option value='10'>Quadro 10</option>";
                                                            echo "<option value='11'>Quadro 11</option>";
                                                        break;
                                                        case 5:
                                                            echo "<option value='1' >Quadro 1</option>";
                                                            echo "<option value='2' >Quadro 2</option>";
                                                            echo "<option value='3' >Quadro 3</option>";
                                                            echo "<option value='4' >Quadro 4</option>";
                                                            echo "<option value='5' selected='selected'>Quadro 5</option>";
                                                            echo "<option value='6' >Quadro 6</option>";
                                                            echo "<option value='7' >Quadro 7</option>";
                                                            echo "<option value='8' >Quadro 8</option>";
                                                            echo "<option value='9' >Quadro 9</option>";
                                                            echo "<option value='10'>Quadro 10</option>";
                                                            echo "<option value='11'>Quadro 11</option>";
                                                        break;
                                                        case 6:
                                                            echo "<option value='1' >Quadro 1</option>";
                                                            echo "<option value='2' >Quadro 2</option>";
                                                            echo "<option value='3' >Quadro 3</option>";
                                                            echo "<option value='4' >Quadro 4</option>";
                                                            echo "<option value='5' >Quadro 5</option>";
                                                            echo "<option value='6' selected='selected'>Quadro 6</option>";
                                                            echo "<option value='7' >Quadro 7</option>";
                                                            echo "<option value='8' >Quadro 8</option>";
                                                            echo "<option value='9' >Quadro 9</option>";
                                                            echo "<option value='10'>Quadro 10</option>";
                                                            echo "<option value='11'>Quadro 11</option>";
                                                        break;
                                                        case 7:
                                                            echo "<option value='1' >Quadro 1</option>";
                                                            echo "<option value='2' >Quadro 2</option>";
                                                            echo "<option value='3' >Quadro 3</option>";
                                                            echo "<option value='4' >Quadro 4</option>";
                                                            echo "<option value='5' >Quadro 5</option>";
                                                            echo "<option value='6' >Quadro 6</option>";
                                                            echo "<option value='7' selected='selected'>Quadro 7</option>";
                                                            echo "<option value='8' >Quadro 8</option>";
                                                            echo "<option value='9' >Quadro 9</option>";
                                                            echo "<option value='10'>Quadro 10</option>";
                                                            echo "<option value='11'>Quadro 11</option>";
                                                        break;
                                                        case 8:
                                                            echo "<option value='1' >Quadro 1</option>";
                                                            echo "<option value='2' >Quadro 2</option>";
                                                            echo "<option value='3' >Quadro 3</option>";
                                                            echo "<option value='4' >Quadro 4</option>";
                                                            echo "<option value='5' >Quadro 5</option>";
                                                            echo "<option value='6' >Quadro 6</option>";
                                                            echo "<option value='7' >Quadro 7</option>";
                                                            echo "<option value='8' selected='selected'>Quadro 8</option>";
                                                            echo "<option value='9' >Quadro 9</option>";
                                                            echo "<option value='10'>Quadro 10</option>";
                                                            echo "<option value='11'>Quadro 11</option>";
                                                        break;
                                                        case 9:
                                                            echo "<option value='1' >Quadro 1</option>";
                                                            echo "<option value='2' >Quadro 2</option>";
                                                            echo "<option value='3' >Quadro 3</option>";
                                                            echo "<option value='4' >Quadro 4</option>";
                                                            echo "<option value='5' >Quadro 5</option>";
                                                            echo "<option value='6' >Quadro 6</option>";
                                                            echo "<option value='7' >Quadro 7</option>";
                                                            echo "<option value='8' >Quadro 8</option>";
                                                            echo "<option value='9' selected='selected'>Quadro 9</option>";
                                                            echo "<option value='10'>Quadro 10</option>";
                                                            echo "<option value='11'>Quadro 11</option>";
                                                        break;
                                                        case 10:
                                                            echo "<option value='1' >Quadro 1</option>";
                                                            echo "<option value='2' >Quadro 2</option>";
                                                            echo "<option value='3' >Quadro 3</option>";
                                                            echo "<option value='4' >Quadro 4</option>";
                                                            echo "<option value='5' >Quadro 5</option>";
                                                            echo "<option value='6' >Quadro 6</option>";
                                                            echo "<option value='7' >Quadro 7</option>";
                                                            echo "<option value='8' >Quadro 8</option>";
                                                            echo "<option value='9' >Quadro 9</option>";
                                                            echo "<option value='10' selected='selected'>Quadro 10</option>";
                                                            echo "<option value='11'>Quadro 11</option>";
                                                        break;
                                                        case 11:
                                                            echo "<option value='1' >Quadro 1</option>";
                                                            echo "<option value='2' >Quadro 2</option>";
                                                            echo "<option value='3' >Quadro 3</option>";
                                                            echo "<option value='4' >Quadro 4</option>";
                                                            echo "<option value='5' >Quadro 5</option>";
                                                            echo "<option value='6' >Quadro 6</option>";
                                                            echo "<option value='7' >Quadro 7</option>";
                                                            echo "<option value='8' >Quadro 8</option>";
                                                            echo "<option value='9' >Quadro 9</option>";
                                                            echo "<option value='10'>Quadro 10</option>";
                                                            echo "<option value='11' selected='selected'>Quadro 11</option>";
                                                        break;
                                                        default:
                                                        echo "
                                                            <option>...</option>
                                                            <option value='1'>Quadro 1</option>
                                                            <option value='2'>Quadro 2</option>
                                                            <option value='3'>Quadro 3</option>
                                                            <option value='4'>Quadro 4</option>
                                                            <option value='5'>Quadro 5</option>
                                                            <option value='6'>Quadro 6</option>
                                                            <option value='7'>Quadro 7</option>
                                                            <option value='8'>Quadro 8</option>
                                                            <option value='9'>Quadro 9</option>
                                                            <option value='10'>Quadro 10</option>
                                                            <option value='11'>Quadro 11</option>
                                                        ";

                                                    } ?>
                                                    
                                                </select>    
                                            </div>
                                        </div>
                                        <div class="form-group">
                                                <label for="empresa" class="col-sm-2 control-label">Notícia</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" name="id_noticia">
                                                            <option>...</option>
                                                            <?php foreach($noticia AS $n) { ?>
                                                                <?php if($dados) { ?>
                                                                <option value="<?= $n->id?>" <?= ($dados->id_noticia == $n->id ? 'selected=""': '') ?>><?= $n->titulo ?></option>
                                                            <?php }else { ?>
                                                                <option value="<?= $n->id ?>"><?= $n->titulo ?></option>
                                                            <?php } ?>
                                                            <?php } ?>
                                                        </select> 
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Status</label>
                                                <div class="col-sm-8">
                                                        <select class="form-control" name="ativo">
                                                                <?php switch($dados->ativo) {
                                                                    case 0:
                                                                        echo "<option value='1'>Ativo</option>";
                                                                        echo "<option value='0' selected='selected'>Inativo</option>";
                                                                    break;
                                                                    case 1:
                                                                        echo "<option value='1' selected='selected'>Ativo</option>";
                                                                        echo "<option value='0'>Inativo</option>";
                                                                    break;
                                                                    default:
                                                                        echo "<option value='1' selected='selected'>Ativo</option>";
                                                                        echo "<option value='0'>Inativo</option>";
                                                                } ?>
                                                        </select> 
                                                </div>
                                            </div>

                                            <?php  if ($dados) { ?>
                                                <input type="hidden" name="id_modulo" value="<?= $dados->id ?>" >
                                            <?php } //fim if ?>

                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-success"><?= $btnTitulo ?></button>
                                                </div>
                                            </div>
                                    </form>

                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_2">
                                    Será parecido com a primeira aba havendo apenas a diferença que não vai ter local e no lugar de notícia
                                    vai ser banner.
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- nav-tabs-custom -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
                                  
            </form>
        </div>
    </div>

</section>