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

                    <a href="<?php echo base_url('editores-modulo'); ?>" title="Novo" class="btn btn-success">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i> Novo
                    </a>

                </div>
            </div>

            <?php getMsg('msgCadastro'); ?>

            <table class="table table-bordered table_listar_data-table">
                <thead>
                    <tr>
                        <th>Nome do editor</th>
                        <th>Foto</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($editores as $editor) { ?>
                        <tr>
                            <td><?= $editor->nome ?></td>
                            <td><?= $editor->foto ?></td>
                            <td class="text-center">
                                <?= ($editor->ativo == 1 ? 
                                    '<i class="text-success fa fa-check-square" aria-hidden="true" title="Ativo"></i>
                                    ':'<i class="text-danger fa fa-window-close" aria-hidden="true" title="Inativo"></i>') ?>
                            </td>
                            <td class="text-center">
                                <a href="<?= base_url('dashboard/editores/Editores/modulo/'.$editor->id ); ?>" title="Atualizar Editor"
                                    class="btn btn-primary"><i class="fa fa-pencil-square-o"></i>
                                </a>
                                <a href="<?= base_url('dashboard/editores/Editores/del/'.$editor->id ); ?>" onclick="return confirm('Deseja realmente excluir esse editor?')" title="Apagar Categoria"
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