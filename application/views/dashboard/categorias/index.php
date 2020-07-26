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

                    <a href="<?php echo base_url('modulos'); ?>" title="Novo" class="btn btn-success">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i> Novo
                    </a>

                </div>
            </div>

            <?php getMsg('msgCadastro'); ?>

            <table class="table table-bordered table_listar_data-table">
                <thead>
                    <tr>
                        <th>Categoria</th>
                        <th>Categoria pai</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($categorias as $cat) { ?>
                        <tr>
                            <td><?= $cat->nome ?></td>
                            <td><?= $this->categoria->getCatPaiNome($cat->id_categoriapai) ?></td>
                            <td class="text-center">
                                <?= ($cat->ativo == 1 ? 
                                    '<i class="text-success fa fa-check-square" aria-hidden="true" title="Ativo"></i>
                                    ':'<i class="text-danger fa fa-window-close" aria-hidden="true" title="Inativo"></i>') ?>
                            </td>
                            <td class="text-center">
                                <a href="<?= base_url('dashboard/categoria/Categoria/modulo/'.$cat->id ); ?>" title="Atualizar Categoria"
                                    class="btn btn-primary"><i class="fa fa-pencil-square-o"></i>
                                </a>
                                <a href="<?= base_url('dashboard/categoria/Categoria/del/'.$cat->id ); ?>" onclick="return confirm('Deseja realmente excluir essa categoria?')" title="Apagar Categoria"
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