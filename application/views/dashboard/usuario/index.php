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

                    <a href="<?php echo base_url('m_usuario'); ?>" title="Novo" class="btn btn-success">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i> Novo
                    </a>

                </div>
            </div>

            <?php getMsg('msgCadastro'); ?> 
            <table class="table table-bordered table_listar_data-table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Tipo de permissão</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($usuario as $u) { ?> 
                        <tr>
                            <td><?= $u->first_name." ".$u->last_name ?></td>
                            
                            <td class="text-center">
                                <?php switch ( $u->group_id ) {
                                    
                                    case '1':
                                        echo 'Administrador';
                                    break;

                                    case '2':
                                        echo 'Usuário';
                                    break;
                                
                                } //fim switch?>

                            </td>
                            <td class="text-center"><?= ($u->active==1)?'Ativo':'Inativo' ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('dashboard/usuario/Usuario/modulo/'.$u->id ); ?>" title="Atualizar usuário"
                                    class="btn btn-primary"><i class="fa fa-pencil-square-o"></i>
                                </a>
                                <a href="<?= base_url('dashboard/usuario/Usuario/del/'.$u->id ); ?>" onclick="return confirm('Deseja realmente excluir esse usuário?')" title="Apagar usuário"
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