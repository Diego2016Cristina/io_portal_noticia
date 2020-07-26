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

                    <a href="<?php echo base_url('config_exibicao'); ?>" title="Novo" class="btn btn-success">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i> Novo
                    </a>

                </div>
            </div>

            <?php getMsg('msgCadastro'); ?>

            <table class="table table-bordered table_listar_data-table">
                <thead>
                    <tr>
                        <th>Modulo</th>
                        <th>Posição</th>
                        <th>Local</th>
                        <th>Notícia</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $controle = array( 1 => 'Posição 1', 2 => 'Posição 2', 3 => 'Posição 3', 4 => 'Posição 4');
                        $controle2 = array( 1 => 'Quadro 1', 2 => 'Quadro 2', 3 => 'Quadro 3', 4=> 'Quadro 4', 5=> 'Quadro 5',
                                            6 => 'Quadro 6', 7 => 'Quadro 7', 8 => 'Quadro 8', 9=> 'Quadro 9', 10=> 'Quadro 10'
                                           , 11=> 'Quadro 11');
              
                    foreach($modulo as $mol) { ?>
                        <tr>
                            <th><?= ($mol->mod_tipo==0)?'Página index':'Página secundaria' ?></th>
                            <th><?= $controle[$mol->posicao_index] ?></th>
                            <th><?= $controle2[$mol->locais_div] ?></th>
                            <th><?= mb_strimwidth($mol->titulo, 0, 50, "..."); ?></th>
                            <th><?= ($mol->ativo==1)?'Ativo':'Inativo' ?></th>
                            <td class="text-center">
                                <a href="<?= base_url('dashboard/config/Config_exibicao/modulo/'.$mol->id ); ?>" title="Atualizar banner"
                                    class="btn btn-primary"><i class="fa fa-pencil-square-o"></i>
                                </a>
                                <a href="<?= base_url('dashboard/config/Config_exibicao/del/'.$mol->id ); ?>" onclick="return confirm('Deseja realmente excluir modulo?')" title="Excluir modulo"
                                    class="btn btn-danger btn-apagar-registro"><i class="fa fa-trash-o"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>    

        </div>
    </div>
</section>