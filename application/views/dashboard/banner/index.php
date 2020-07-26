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

                    <a href="<?php echo base_url('m-b'); ?>" title="Novo" class="btn btn-success">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i> Novo
                    </a>

                </div>
            </div>

            <?php getMsg('msgCadastro'); ?>

            <table class="table table-bordered table_listar_data-table">
                <thead>
                    <tr>
                        <th>Título banner</th>
                        <th>Tipo</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($banner as $ban) { ?>
                        <tr>
                            <td><?= $ban->titulo ?></td>
                            
                            <td class="text-center">
                                <?php switch ( $ban->tipo ) {
                                    
                                    case '1':
                                        echo 'Banner grande topo';
                                    break;

                                    case '2':
                                        echo 'Banner lateral pequeno';
                                    break;

                                    case '3':
                                        echo 'Banner pagina leitura noticia';
                                    break;
                                
                                } //fim switch?>

                            </td>
                            <td class="text-center"><?= ($ban->ativo==1)?'Ativo':'Inativo' ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('dashboard/banner/Banner/modulo/'.$ban->id ); ?>" title="Atualizar banner"
                                    class="btn btn-primary"><i class="fa fa-pencil-square-o"></i>
                                </a>
                                <a href="<?= base_url('dashboard/banner/Banner/del/'.$ban->id ); ?>" onclick="return confirm('Deseja realmente excluir esse banner?')" title="Apagar banner"
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