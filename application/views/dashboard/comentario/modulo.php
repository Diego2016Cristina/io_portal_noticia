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

                    <a href="<?php echo base_url('comentario'); ?>" title="voltar" class="btn btn-success">
                        <i class="fa fa-arrow-left"></i> Voltar
                    </a>

                </div>
            </div>

            <form action="<?php echo base_url('core_comentario'); ?>" method="post" accept-charset="utf-8" class="form-horizontal">
            
                <?php 
                
                    errosValidacao();
                    getMsg('msgCadastro'); 
                
                ?>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Informaçães</label>
                  <div class="col-sm-4">
                    <p>Nome: <?= $dados->nome ?></p>
                    <p>Título: <?= $dados->titulo ?></p>
                  </div>
                </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Comentário</label>
                <div class="col-sm-10">
                  <textarea class="form-control ckeditor" name="comentario" id="editor1" rows="3">
                    <?= $dados->comentario ?>
                  </textarea>
                </div>
              </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Liberar</label>
                    <div class="col-sm-4">
                        <select name="liberado" class="form-control">

                            <?php if ($dados) { //inicio do if?>
                                 <option value="0" <?= ($dados->liberado == 0 ? 'selected=""' : '') ?>>A liberar</option>
                                 <option value="1" <?= ($dados->liberado == 1 ? 'selected=""' : '') ?>>Liberado</option>
                            <?php } else { ?>
                                <option value="0">A liberar</option>
                                <option value="1" selected="">Liberado</option>
                            <?php  } //Fim do if ?>
                        </select>    
                    </div>
                </div>
                
                    <input type="hidden" name="id_comentario" value="<?= $dados->id_comentario ?>" >
                
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
