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

                    <a href="<?php echo base_url('s_home'); ?>" title="Novo" class="btn btn-success">
                        <i class="fa fa-reply" aria-hidden="true"></i> Voltar
                    </a>

                </div>
            </div>

            <?php 

                errosValidacao();
                getMsg('msgCadastro');

            ?>

            <form class="form-horizontal" method="post" action="<?= base_url('config'); ?>"> 
                <div class="form-group">
                    <label for="titulo" class="col-sm-2 control-label">Título do portal</label>
                        <div class="col-sm-10">
                            <input type="text" name="titulo" class="form-control" id="titulo" placeholder="Título" required="" value="<?= @$query->titulo ?>"/>
                        </div>
                </div>

                <div class="form-group">
                    <label for="meta_descricao" class="col-sm-2 control-label">Meta descrição</label>
                        <div class="col-sm-10">
                            <input type="text" name="meta_descricao" class="form-control" id="meta_descricao" placeholder="Meta descrição" required="" value="<?= @$query->meta_descricao ?>" />
                        </div>
                </div>

                <div class="form-group">
                    <label for="a_destaque" class="col-sm-2 control-label">Total de notícias em destaque</label>
                        <div class="col-sm-10">
                            <input type="number" name="a_destaque" class="form-control" id="a_destaque" value="<?= @$query->a_destaque ?>" />
                        </div>
                </div>

                <div class="form-group">
                    <label for="empresa" class="col-sm-2 control-label">Nome da empresa</label>
                        <div class="col-sm-10">
                            <input type="text" name="empresa" class="form-control" id="empresa" placeholder="Empresa" required="" value="<?= @$query->empresa ?>" />
                        </div>
                </div>

                <div class="form-group">
                    <label for="endereco" class="col-sm-2 control-label">Endereço</label>
                        <div class="col-sm-10">
                            <input type="text" name="endereco" class="form-control" id="endereco" placeholder="Endereço" required="" value="<?= @$query->endereco ?>" />
                        </div>
                </div>

                <div class="form-group">
                    <label for="bairro" class="col-sm-2 control-label">Bairro</label>
                        <div class="col-sm-10">
                            <input type="text" name="bairro" class="form-control" id="bairro" placeholder="Bairro" required="" value="<?= @$query->bairro ?>" />
                        </div>
                </div>

                <div class="form-group">
                    <label for="cep" class="col-sm-2 control-label">CEP</label>
                        <div class="col-sm-10">
                            <input type="text" name="cep" class="form-control" id="cep" placeholder="CEP" required="" value="<?= @$query->cep ?>" />
                        </div>
                </div>

                <div class="form-group">
                    <label for="complemento" class="col-sm-2 control-label">Complemento</label>
                        <div class="col-sm-10">
                            <input type="text" name="complemento" class="form-control" id="complemento" placeholder="Complemento" value="<?= @$query->complemento ?>" />
                        </div>
                </div>

                <div class="form-group">
                    <label for="cidade" class="col-sm-2 control-label">Cidade</label>
                        <div class="col-sm-10">
                            <input type="text" name="cidade" class="form-control" id="cidade" placeholder="Cidade" required="" value="<?= @$query->cidade ?>" />
                        </div>
                </div>

                <div class="form-group">
                    <label for="estado" class="col-sm-2 control-label">Estado</label>
                        <div class="col-sm-10">
                            <input type="text" name="estado" class="form-control" id="estado" placeholder="Estado" required="" value="<?= @$query->estado ?>" />
                        </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email" required="" value="<?= @$query->email ?>" />
                        </div>
                </div>
                
                <div class="form-group">
                    <label for="telefone" class="col-sm-2 control-label">Telefone</label>
                        <div class="col-sm-10">
                            <input type="text" name="telefone" class="form-control" id="telefone" placeholder="Telefone" required="" value="<?= @$query->telefone ?>" />
                        </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success"><?= $bntTitulo ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</section>