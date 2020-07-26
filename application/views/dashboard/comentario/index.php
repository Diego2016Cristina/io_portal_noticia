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

                    <a href="<?php echo base_url('s_home'); ?>" title="Voltar" class="btn btn-success">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i> Voltar
                    </a>

                </div>
            </div>

            <?php getMsg('msgCadastro'); ?>

            <table class="table table-bordered table_listar_data-table">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Nome</th>
                        <th>Comentário</th>
                        <th>Título da notícia</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($comentario as $c) { ?>
                        <tr>
                            <td><?= formatarDataV($c->dt_cad); ?></td>
                            <td><?= $c->nome ?></td>
                            <td><?= $c->comentario ?></td>
                            <td><?= $c->titulo ?></td>
                            
                            <td class="text-center"><?= ($c->liberado==1)?'Liberado':'A liberar' ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('dashboard/comentario/Comentario/modulo/'.$c->id_comentario ); ?>" title="Atualizar comentário"
                                    class="btn btn-primary"><i class="fa fa-pencil-square-o"></i>
                                </a>
                                <a href="<?= base_url('dashboard/comentario/Comentario/del/'.$c->id_comentario ); ?>" onclick="return confirm('Deseja realmente excluir esse comentário?')" title="Apagar comentário"
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