<?php 
  setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
   date_default_timezone_set('America/Sao_Paulo');
?>

<script>
document.onkeydown = function(e) {
        if (e.ctrlKey && 
            (e.keyCode === 67 || 
             e.keyCode === 86 || 
             e.keyCode === 85 || 
             e.keyCode === 117||
             e.keycode === 02)) {
            alert('Operação Não permitida.');
            return false;
        } else {
            return true;
        }
};
</script>
<style>
    .title_p {
        word-spacing: -4px;
        font-weight: 700;
        font-family: 'Arial', sans-serif;
        font-size: 3.5rem;
        line-height: 38px;
        color: #151515;
    }
    .title_r {
        position:relative;
        top: 10px;
        font-size: 1.787rem;
        font-stretch: condense;
    font-family: sans-serif, "Helvetica Neue", "Lucida Grande", Arial;
    color: #666;
    }
    .editor_title {
        position: relative;
        padding-bottom: 20px;
        top: 20px;
        font-weight: bold;
        font-family: 'Arial', sans-serif;
        color: #555555;
    }
    #espaco_noticia {
        position: relative;
        padding-bottom: 50px;
    }
    .editor_texto {
        
    }

    .box-header {
        position: relative;
        margin: 0 auto;
        width: 85%;
    }
    
</style>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">

            <div class="row margin-bottom-20" style="margin-bottom: 10px">
                <div class="col-sm-12 text-right">

                    <a href="<?php echo base_url('noticia'); ?>" title="Novo" class="btn btn-success">
                        <i class="fa fa-reply" aria-hidden="true"></i> Voltar
                    </a>

                </div>
            </div>
        </div>

        <div class="box-header">
            <p class="title_p h1"><?= $dados_modulo->titulo ?></p>
            <p class="title_r"><?= $dados_modulo->resumo ?></p>
            <div class="row">
                <div class="col-sm text-left mb-5">
                    <div class="col-sm-12">
                        <p class="editor_title">
                            <?= "<i class='fa fa-user' aria-hidden='true'></i> ".$dados_modulo->nome_editor."&nbsp;&nbsp;&nbsp;<i class='fa fa-calendar-o' aria-hidden='true'>
                                </i> ".utf8_encode(strftime('%A, %d de %B, de %Y', strtotime($dados_modulo->dt_cad))); ?>
                        </p>
                    </div>
                    <div class="col-sm-12" id="espaco_noticia">
                        <p class="editor_texto"><?= $dados_modulo->noticia ?></p>
                    </div>
                </div>
            </div>
        </div>
</section>