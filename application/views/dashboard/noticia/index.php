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
    <div class="box table-responsive"><!-- CASO QUEIRA ELA RESPONSIVA (table-responsive) -->
        <div class="box-header with-border">
            <div class="row margin-bottom-20" style="margin-bottom: 10px">
                <div class="col-sm-12 text-right">

                    <a href="<?php echo base_url('noticia-modulo'); ?>" title="Novo" class="btn btn-success">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i> Novo
                    </a>

                </div>
            </div>

            <?php getMsg('msgCadastro'); 

                // Array
                // (
                //     [0] => stdClass Object
                //         (
                //             [id] => 1
                //             [id_editor] => 27
                //             [id_categoria] => 57
                //             [titulo] => Campo de guerra
                //             [resumo] => Campo
                //             [noticia] => Teste de campo...
                //             [ativo] => 1
                //             [dt_cad] => 2020-03-19
                //             [ultima_atualizacao] => 2020-03-19 10:29:05
                //             [img] => 
                //             [editores] => Diego Xavier
                //             [categoria] => ÚLTIMAS NOTÍCIAS
                //         )

                // )

            ?>

            <table class="display table table-bordered table_listar_data-table" >
                <thead>
                    <tr>
                        <th title="Data da criação">Data da criação</th>
                        <th title="Título notícia">Título</th>
                        <th title="Editor responsável">Editor responsável</th>
                        <th title="Categoria vinculada">Categoria</th>
                        <th title="estado">Estado</th>
                        <th class="text-center">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $op = array( 1 => 'Publicado', 2 => 'Não publicado', 3 => 'Arquivado', 4 => 'No lixo'); ?>
                    <?php foreach($noticia AS $not) { ?>
                        <tr>
                            <td><?= formatarDataV($not->dt_cad) ?></td>
                            <td><?= mb_strimwidth("$not->titulo", 0, 50, "..."); ?></td><!-- Limita a quantidade de caractere a ser mostrada -->
                            <td><?= $not->editores ?></td>
                            <td><?= $not->categoria ?></td>
                            <td><?= $op[$not->estado] ?></td>                           
                            
                            <td class="text-center" style="float:flex">
                                <a href="<?= base_url('dashboard/noticia/Noticia/visualizar/'. $not->id); ?>" title="Visualizar conteúdo" 
                                    class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                <a href="<?= base_url('dashboard/noticia/Noticia/modulo/'. $not->id); ?>" title="Atualizar conteúdo" 
                                    class="btn btn-primary"><i class="fa fa-pencil-square"></i>
                                </a>
                                <a href="<?= base_url('dashboard/noticia/Noticia/del/'. $not->id); ?>" onclick="return confirm('Deseja realmente excluir essa notícia?')" title="Apagar conteúdo"
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