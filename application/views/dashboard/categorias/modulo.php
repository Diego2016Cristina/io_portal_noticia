<script type="text/javascript">//Ainda não está funcional, verificar isso + tarde.
    setTimeout(function() {
    $(".mark").fadeOut().empty();
    }, 5000);      
</script>

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

                    <a href="<?php echo base_url('categorias'); ?>" title="voltar" class="btn btn-success">
                        <i class="fa fa-arrow-left"></i> Voltar
                    </a>

                </div>
            </div>

            <form action="<?php echo base_url('core'); ?>" method="post" accept-charset="utf-8" class="form-horizontal">
            
                <?php 
                
                    errosValidacao();
                    getMsg('msgCadastro'); 
                
                ?>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Nome categoria</label>
                        <div class="col-sm-8">
                            <input type="text" name="nome" class="form-control" placeholder="Nome" value="<?php echo ( $dados != NULL ? $dados->nome : set_value('nome')); ?>" >
                        </div>
                    </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Categoria pai</label>
                    <div class="col-sm-4">
                        <select name="id_categoriapai" class="form-control">
                            <option></option>
                            <?php foreach ( $cat_pai as $cat ) { ?>
                                <?php if ($dados) { //inicio do if?>

                                <option value="<?= $cat->id ?>" <?= ($dados->id_categoriapai == $cat->id ? 'selected=""' : 
                                '') ?>><?= $cat->nome ?></option>
                            
                            <?php } else { ?>
                                
                                <option value="<?= $cat->id ?>"><?= $cat->nome ?></option>
                            
                            <?php  } //Fim do if ?>

                            <?php  } //foreach ?>
                        </select>
                    </div>
                </div> 

                <div class="form-group">
                    <label class="col-sm-2 control-label">Ativo</label>
                    <div class="col-sm-4">
                        <select name="ativo" class="form-control">

                            <?php if ($dados) { //inicio do if?>
                                 <option value="0" <?= ($dados->ativo == 0 ? 'selected=""' : '') ?>>Não</option>
                                 <option value="1" <?= ($dados->ativo == 1 ? 'selected=""' : '') ?>>Sim</option>
                            <?php } else { ?>
                                <option value="0">Não</option>
                                <option value="1" selected="">Sim</option>
                            <?php  } //Fim do if ?>
                        </select>    
                    </div>
                </div>
                
                <?php  if ($dados) { ?>
                    <input type="hidden" name="id_categoria" value="<?= $dados->id ?>" >
                <?php } //fim if ?>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-check-cicle-o"></i> Salvar
                        </button>
                    </div>           
                </div>
            </form>
        </div>
    </div>
</section>
<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/jquery.min.js'); ?>"></script>