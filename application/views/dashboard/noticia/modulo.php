<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>



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
    <form action="<?php echo base_url('cadastrar-noticia'); ?>" method="post" accept-charset="utf-8" class="form-horizontal">
    <div class="box">
        <div class="box-header with-border">
            <div class="row margin-bottom-20 fixed" style="margin-bottom: 10px">
                <div class="col-sm-12 text-right">
                    <div class="col-sm-2">
                        <button class="btn btn-success btn-sm btn-block"><?= (isset($op_update) && $op_update == 1) ? 'ATUALIZAR' : 'SALVAR' ?></button>
                    </div>
                    <div class="col-sm-2">
                        <button class="btn btn-danger btn-sm btn-block"><?= (isset($op_update) && $op_update == 1) ? 'ATUALIZAR-FECHAR' : 'SALVAR-FECHAR' ?></button>
                    </div>
                    <div class="col-sm-2">
                        <button class="btn btn-primary btn-sm btn-block"><?= (isset($op_update) && $op_update == 1) ? 'ATUALIZAR-NOVO' : 'SALVAR-NOVO' ?></button>
                    </div>
                    <div class="col-sm-2">
                        <button class="btn btn-danger btn-sm btn-block">CANCELAR</button>
                    </div>
                    <div class="col-sm-4">
                        <a href="<?php echo base_url('noticia'); ?>" title="voltar" class="btn btn-success">
                            <i class="fa fa-arrow-left"></i> Voltar
                        </a>
                    </div>
                </div>
            </div>
            
                <?php 
                
                    errosValidacao();
                    getMsg('msgCadastro');
                
                ?>

                <div class="form-group">
                    <label for="dt_cad" class="col-sm-2 control-label">Data da postagem</label>
                    <div class="col-sm-2">
                        <input type="date" required="required" name="dt_cad" id="dt_cad" class="form-control" placeholder="Data de cadastro" 
                        value="<?= ( $dados_modulo != NULL ? $dados_modulo->dt_cad : date('Y-m-d')) ?>" >
                    </div>
                </div>

                <div class="form-group">
                    <label for="titulo" class="col-sm-2 control-label">Título notícia</label>
                    <div class="col-sm-8">
                        <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Título notícia" 
                        value="<?= ( $dados_modulo != NULL ? $dados_modulo->titulo : set_value('titulo')) ?>" >
                    </div>
                </div>

                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label for="tag" class="col-sm-3 control-label">Tag</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="tag" id="tag" value="<?= ( $dados_modulo != NULL ? $dados_modulo->tag : set_value('tag')) ?>" placeholder="Insira o nome para tag">
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-4">
                            
                            <div class="form-group">
                                <label for="tag" class="col-sm-2 control-label">Tipo</label>
                                <div class="col-sm-10">
                                    <select name="id_tipo_tag" class="form-control" id="tag" >
                                        <option></option>
                                        <?php foreach( $tags AS $t ) { ?>
                                            <?php if( $dados_modulo) { ?>
                                                <option value="<?= $t->id ?>" <?= ($dados_modulo->id_tipo_tag == $t->id ? 'selected=""' : '') ?>><?= $t->nome ?></option>
                                            <?php } else { ?> 
                                                <option value="<?= $t->id ?>"><?= $t->nome ?></option>
                                            <?php } ?>
                                            <?php } ?>   
                                    </select> 
                                </div>
                            </div>

                        </div>
                    </div>

                <div class="form-group">
                    <label for="resumo" class="col-sm-2 control-label">Resumo</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="resumo" id="resumo" value="<?= ( $dados_modulo != NULL ? $dados_modulo->resumo : set_value('resumo')) ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Categoria</label>
                    <div class="col-sm-4">
                        <select name="id_categoriapai" class="form-control">
                            <option></option>
                            <?php foreach ( $cat_pai as $cat ) { ?>
                                <?php if ($dados_modulo) { //inicio do if?>

                                <option value="<?= $cat->id ?>" <?= ($dados_modulo->id_categoria == $cat->id ? 'selected=""' : '') ?>><?= $cat->nome ?></option>
                            
                            <?php } else { ?>
                                
                                <option value="<?= $cat->id ?>"><?= $cat->nome ?></option>
                            
                            <?php  } //Fim do if ?>

                            <?php  } //foreach ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="editor" class="col-sm-2 control-label">Editor(a)</label>
                    <div class="col-sm-4">
                        <select name="id_editor" class="form-control" >
                            <option></option>
                            <?php foreach( $editores AS $editor ) { ?>
                                <?php if( $dados_modulo) { ?>
                                    <option value="<?= $editor->id ?>" <?= ($dados_modulo->id_editor == $editor->id ? 'selected=""' : '') ?>><?= $editor->nome ?></option>
                                <?php } else { ?> 
                                    <option value="<?= $editor->id ?>"><?= $editor->nome ?></option>
                                <?php } ?>
                                <?php } ?>   
                        </select> 
                    </div>
                </div>

                <div class="form-group">
                    <label for="editor1" class="col-sm-2 control-label">Corpo da notícia</label>
                    <div class="col-sm-10">
                        <textarea class="form-control ckeditor" name="editor1" id="editor1" rows="3">
                           <?= ($dados_modulo != NULL ? $dados_modulo->noticia : set_value('noticia')) ?>
                        </textarea> 
                    </div>
                </div>
                <?php if($dados_modulo && isset($dados_modulo->img)) { ?>

                <div class="foto-noticia col-sm-offset-2" style="padding-bottom: 10px;">
                    <a href="#" title="Apagar" class="btn btn-danger" id="btn-apgar-foto-noticia">Apagar</a>
                    <div class="col-sm-offset" style="position: relative;top: 10px; width: 200px; border: 2px solid #666666; margin-bottom:10px">  
                      <img src="<?= base_url('assets/uploads/fotos_noticias/'. $dados_modulo->img );?>" class="img-responsive">
                        <input type="hidden" name="img" value="<?= $dados_modulo->img ?>" />
                    </div>
                </div>

                <?php } //fim if?>
          
               <div class="form-group <?= (isset($dados_modulo->img)? 'hide':'' ); ?>" id="input-upload-foto-noticia">
                    <label for="foto_noticia" class="col-sm-2 control-label">Imagem da notícia</label>
                    <div class="col-sm-8">
                        <input type="file" id="foto_noticia" name="foto_noticia" class="form-control" value="<?php echo ( $dados_modulo != NULL ? $dados_modulo->titulo : set_value('titulo')); ?>" >
                        <div id="upload_foto_view_noticia" class="" style="padding-top: 10px"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inicio_publicacao" class="col-sm-2 control-label">Início da publicação</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-4">
                                <input type="date" name="inicio_publicacao" id="inicio_publicacao" class="form-control" 
                                value="<?= ( $dados_modulo != NULL ? $dados_modulo->inicio_publicacao : date('Y-m-d')) ?>"/>
                            </div>
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4"></div>
                        </div>                         
                    </div>
                </div>

                <div class="form-group">
                    <label for="fim_publicacao" class="col-sm-2 control-label">Fim da publicação</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-4">
                                <input type="date" name="fim_publicacao" id="fim_publicacao" class="form-control" 
                                value="<?= ( $dados_modulo != NULL ? $dados_modulo->fim_publicacao : date('Y-m-d')) ?>"/>
                            </div>
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4"></div>
                        </div>                         
                    </div>
                </div>

                <div class="form-group">
                    <label for="estado" class="col-sm-2 control-label">Estado</label>
                    <div class="col-sm-10">
                    <div class="row">
                            <div class="col-sm-4">
                                
                                <?php if( $dados_modulo) { ?>
                                    <select class="form-control" name="estado" id="estado">
                                        <option value="1" <?= ( $dados_modulo->estado == 1 ? 'selected=""' : '') ?>>Publicado</option>
                                        <option value="2" <?= ( $dados_modulo->estado == 2 ? 'selected=""' : '') ?>>Não publicado</option>
                                        <option value="3" <?= ( $dados_modulo->estado == 3 ? 'selected=""' : '') ?>>Arquivado</option>
                                        <option value="4" <?= ( $dados_modulo->estado == 4 ? 'selected=""' : '') ?>>No lixo</option>
                                    </select>

                                <?php } else { ?>
                                    <select class="form-control" name="estado" id="estado">
                                        <option value="1">Publicado</option>
                                        <option value="2">Não publicado</option>
                                        <option value="3">Arquivado</option>
                                        <option value="4">No lixo</option>
                                    </select>
                                <?php } ?>                                    
                                
                            </div>
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4"></div>
                        </div>                        
                    </div>
                </div>

                <div class="form-group">
                    <label for="destaque" class="col-sm-2 control-label">Destacado</label>
                    <div class="col-sm-10">
                    <div class="row">
                            <div class="col-sm-4">

                            <?php if( $dados_modulo) { ?>

                                <select class="form-control" name="destaque" id="destaque">

                                    <option value="1" <?= ( $dados_modulo->destaque == 1 ? 'selected=""' : '') ?>>Sim</option>
                                    <option value="0" <?= ( $dados_modulo->destaque == 0 ? 'selected=""' : '') ?>>Não</option>
                                
                                </select>

                                <?php } else { ?>
                                    <select class="form-control" name="destaque" id="destaque">

                                        <option value="1">Sim</option>
                                        <option value="0">Não</option>

                                    </select>
                                <?php } ?> 

                            </div>
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4"></div>
                        </div>                        
                    </div>
                </div>
                <?php if(isset($op_update) && $op_update == 1) { ?>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Data de revisão</label>
                        <div class="col-sm-10">
                        <div class="row">
                                <div class="col-sm-4">
                                <input type="text" name="ultima_atualizacao" placeholder="" class="form-control"
                                value="<?= ( $dados_modulo != NULL ? $dados_modulo->ultima_atualizacao : set_value('ultima_atualizacao')) ?>" disabled="disabled"> 
                                </div>
                                <div class="col-sm-4"></div>
                                <div class="col-sm-4"></div>
                            </div>                        
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Revisado por</label>
                        <div class="col-sm-10">
                        <div class="row">
                                <div class="col-sm-4">
                                <input type="text" name="dt_rev_por" value="<?= $editor->nome ?>" placeholder="" class="form-control" disabled="disabled"> 
                                </div>
                                <div class="col-sm-4"></div>
                                <div class="col-sm-4"></div>
                            </div>                        
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="acesso" class="col-sm-2 control-label">Qtde de acessos</label>
                        <div class="col-sm-10">
                        <div class="row">
                                <div class="col-sm-4">
                                <input type="text" name="acesso" id="acesso" value="<?= $dados_modulo->acesso ?>" placeholder="" class="form-control" disabled="disabled"> 
                                </div>
                                <div class="col-sm-4"></div>
                                <div class="col-sm-4"></div>
                            </div>                        
                        </div>
                    </div>

                <?php } else { ?>

                <?php } ?>
                <?php  if ($dados_modulo) { ?>
                    <input type="hidden" name="id_noticia" value="<?= $dados_modulo->id ?>" >
                <?php } //fim if ?>

            </form>
        </div>
    </div>
</section>
<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/jquery.min.js'); ?>"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="<?php echo base_url('assets/ckeditor/ckeditor.js'); ?>"></script>
<script src="<?php echo base_url('assets/ckeditor/adapters/jquery.js'); ?>"></script>