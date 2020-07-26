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

                    <a href="<?php echo base_url('editores'); ?>" title="voltar" class="btn btn-success">
                        <i class="fa fa-arrow-left"></i> Voltar
                    </a>

                </div>
            </div>

            <form action="<?php echo base_url('cadastrar-editor'); ?>" method="post" accept-charset="utf-8" class="form-horizontal" enctype="multipart/form-data">
            
                <?php 
                
                    errosValidacao();
                    getMsg('msgCadastro'); 
                
                ?>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Nome do editor</label>
                    <div class="col-sm-8">
                        <input type="text" name="nome" class="form-control" placeholder="Nome" value="<?php echo ( $dados != NULL ? $dados->nome : set_value('nome')); ?>" required="">
                    </div>
                </div>

                <?php if($dados && isset($dados->foto)) { ?>

                    <div class="editor-foto col-sm-offset-2" style="padding-bottom: 10px;">
                        <a href="#" title="Apagar" class="btn btn-danger" id="btn-apgar-foto-editor">Apagar</a>
                        <div class="col-sm-offset" style="position: relative;top: 10px; width: 200px; border: 2px solid #666666">
                            <img src="<?= base_url('assets/uploads/fotos_editores/'. $dados->foto );?>" class="img-responsive">
                            <input type="hidden" name="foto" value="<?= $dados->foto ?>" />
                        </div>
                    </div>
                    
                <?php } //fim if?>

                <div class="form-group <?= ( isset($dados->foto)? 'hide':'' ); ?>" id="input-upload-foto-editor">
                    <label class="col-sm-2 control-label">Foto</label>
                    <div class="col-sm-8">
                        <input type="file" id="foto_editor" name="foto_editor" class="form-control" placeholder="Nome" value="<?php echo ( $dados != NULL ? $dados->nome : set_value('nome')); ?>" >
                    </div>
                </div>

                <div id="upload_foto_view" class="col-sm-offset-2" style="padding-bottom: 10px;"></div>

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
                    <input type="hidden" name="id_editor" value="<?= $dados->id ?>" >
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