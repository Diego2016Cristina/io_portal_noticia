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

                    <a href="<?php echo base_url('index_usuario'); ?>" title="voltar" class="btn btn-success">
                        <i class="fa fa-arrow-left"></i> Voltar
                    </a>

                </div>
            </div>

            <form action="<?php echo base_url('cad-usuario'); ?>" method="post" accept-charset="utf-8" class="form-horizontal">
            
                <?php
                
                    errosValidacao();
                    getMsg('msgCadastro');
                
                ?>
              
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nome</label>
                    <div class="col-sm-8">
                        <input type="text" name="nome" id="titulo" class="form-control" placeholder="nome" value="<?php echo ( $dados != NULL ? $dados->first_name : set_value('nome')); ?>" required="">
                    </div>
                </div>
              
                <div class="form-group">
                    <label class="col-sm-2 control-label">Sobrenome</label>
                    <div class="col-sm-8">
                        <input type="text" name="sobrenome" id="sobrenome" class="form-control" placeholder="sobrenome" value="<?php echo ( $dados != NULL ? $dados->last_name : set_value('sobrenome')); ?>" required="">
                    </div>
                </div>
              
               <div class="form-group">
                    <label class="col-sm-2 control-label">Celular (Whatsapp)</label>
                    <div class="col-sm-8">
                        <input type="text" name="cel" id="cel" class="form-control" placeholder="celular" value="<?php echo ( $dados != NULL ? $dados->phone : set_value('cel')); ?>" required="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-8">
                        <input type="email" name="email" id="email" class="form-control" placeholder="email" value="<?php echo ( $dados != NULL ? $dados->email : set_value('email')); ?>" required="">
                    </div>
                </div>
              
              <div id="upload_foto_view_banner" class="col-sm-offset-2" style="padding-top: 10px"></div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Perfil</label>
                    <div class="col-sm-4">
                        <select name="tipo" class="form-control">

                            <?php if ($dados) { //inicio do if?>
                                 <option value="1" <?= ($dados->group_id == 1 ? 'selected=""' : '') ?>>Administrador</option>
                                 <option value="2" <?= ($dados->group_id == 2 ? 'selected=""' : '') ?>>Usuário</option>
                            <?php } else { ?>
                                <option selected="">SELECIONE</option>
                                <option value="1">Administrador</option>
                                <option value="2">Usuário</option>
                            <?php  } //Fim do if ?>
                        </select>    
                    </div>
                </div>
              
               <div class="form-group">
                    <label class="col-sm-2 control-label">Senha (Provisoria)</label>
                    <div class="col-sm-8">
                        <input type="password" name="senha" id="senha" class="form-control" placeholder="senha" value="<?php echo ( $dados != NULL ? $dados->password: set_value('senha')); ?>" required="">
                    </div>
                </div>
              
                <div class="form-group">
                    <label class="col-sm-2 control-label">Tipo de permissão</label>
                    <div class="col-sm-8">
                      <ul>
                        <li class="text-primary" style="font-weight: bold">Categorias</li>
                          <input type="checkbox" class="form-check-input" name="c_categoria" id="c_categoria">
                          <label class="form-check-label" for="c_categoria">Criar categoria</label>&nbsp;&nbsp;|&nbsp;&nbsp;
                          <input type="checkbox" class="form-check-input" name="e_categoria" id="e_categoria">
                          <label class="form-check-label" for="e_categoria">Editar categoria</label>&nbsp;&nbsp;|&nbsp;&nbsp;
                          <input type="checkbox" class="form-check-input" name="ex_categoria" id="ex_categoria">
                          <label class="form-check-label" for="ex_categoria">Excluir categoria</label>
                        <li class="text-primary" style="font-weight: bold">Noticias</li>
                          <input type="checkbox" class="form-check-input" name="c_noticia" id="c_noticia">
                          <label class="form-check-label" for="c_noticia">Criar notícia</label>&nbsp;&nbsp;|&nbsp;&nbsp;
                          <input type="checkbox" class="form-check-input" name="e_noticia" id="e_noticia">
                          <label class="form-check-label" for="e_noticia">Editar notícia</label>&nbsp;&nbsp;|&nbsp;&nbsp;
                          <input type="checkbox" class="form-check-input" name="ex_noticia" id="ex_noticia">
                          <label class="form-check-label" for="ex_noticia">Excluir notícia</label>
                        <li class="text-primary" style="font-weight: bold">Comentários</li>
                          <input type="checkbox" class="form-check-input" name="v_comentario" id="v_comentario">
                          <label class="form-check-label" for="v_comentario">Ver comentário</label>&nbsp;&nbsp;|&nbsp;&nbsp;
                          <input type="checkbox" class="form-check-input" name="e_comentario" id="e_comentario">
                          <label class="form-check-label" for="e_comentario">Editar comentário</label>&nbsp;&nbsp;|&nbsp;&nbsp;
                          <input type="checkbox" class="form-check-input" name="ex_comentario" id="ex_comentario">
                          <label class="form-check-label" for="ex_comentario">Excluir comentário</label>
                        <li class="text-primary" style="font-weight: bold">Editores</li>
                          <input type="checkbox" class="form-check-input" name="c_editores" id="c_editores">
                          <label class="form-check-label" for="c_editores">Criar editores</label>&nbsp;&nbsp;|&nbsp;&nbsp;
                          <input type="checkbox" class="form-check-input" name="e_editores" id="e_editores">
                          <label class="form-check-label" for="e_editores">Editar editores</label>&nbsp;&nbsp;|&nbsp;&nbsp;
                          <input type="checkbox" class="form-check-input" name="ex_editores" id="ex_editores">
                          <label class="form-check-label" for="ex_editores">Excluir editores</label>
                        <li class="text-primary" style="font-weight: bold">Banner</li>
                          <input type="checkbox" class="form-check-input" name="c_banner" id="c_banner">
                          <label class="form-check-label" for="c_banner">Criar banner</label>&nbsp;&nbsp;|&nbsp;&nbsp;
                          <input type="checkbox" class="form-check-input" name="e_banner" id="e_banner">
                          <label class="form-check-label" for="e_banner">Editar banner</label>&nbsp;&nbsp;|&nbsp;&nbsp;
                          <input type="checkbox" class="form-check-input" name="ex_banner" id="ex_banner">
                          <label class="form-check-label" for="ex_banner">Excluir banner</label>
                        <li class="text-primary" style="font-weight: bold">Usuário</li>
                          <input type="checkbox" class="form-check-input" name="c_usuario" id="c_usuario">
                          <label class="form-check-label" for="c_usuario">Criar usuário</label>&nbsp;&nbsp;|&nbsp;&nbsp;
                          <input type="checkbox" class="form-check-input" name="e_usuario" id="e_usuario">
                          <label class="form-check-label" for="e_usuario">Editar usuário</label>&nbsp;&nbsp;|&nbsp;&nbsp;
                          <input type="checkbox" class="form-check-input" name="ex_usuario" id="ex_usuario">
                          <label class="form-check-label" for="ex_usuario">Excluir usuário</label>
                        <li class="text-primary" style="font-weight: bold">Configurações do sistema</li>
                          <input type="checkbox" class="form-check-input" name="e_config_sistema" id="e_config_sistema">
                          <label class="form-check-label" for="e_config_sistema">Editar</label>
                        <li class="text-primary" style="font-weight: bold">Exibição do portal</li>
                          <input type="checkbox" class="form-check-input" name="e_exib_portal" id="e_exib_portal">
                          <label class="form-check-label" for="e_exib_portal">Editar</label>&nbsp;&nbsp;|&nbsp;&nbsp;
                          <input type="checkbox" class="form-check-input" name="ex_exib_portal" id="ex_exib_portal">
                          <label class="form-check-label" for="ex_exib_portal">Excluir</label>
                      </ul>
                    
                    </div>             
                </div>
              
                <div class="form-group">
                    <label class="col-sm-2 control-label">Ativo</label>
                    <div class="col-sm-4">
                        <select name="ativo" class="form-control">

                            <?php if ($dados) { //inicio do if?>
                                 <option value="0" <?= ($dados->active == 0 ? 'selected=""' : '') ?>>Não</option>
                                 <option value="1" <?= ($dados->active == 1 ? 'selected=""' : '') ?>>Sim</option>
                            <?php } else { ?>
                                <option value="0">Não</option>
                                <option value="1" selected="">Sim</option>
                            <?php  } //Fim do if ?>
                        </select>    
                    </div>
                </div>
              
                <?php  if ($dados) { ?>
                    <input type="hidden" name="id_usuario" value="<?= $dados->id ?>" >
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
