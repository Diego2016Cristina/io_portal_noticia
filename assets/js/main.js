$(document).ready(function() {  
  /**
  * PLUGIN DATA-TABLES
  */
  $('.table_listar_data-table').DataTable({

    "language": {
        "sEmptyTable": "Nenhum registro encontrado",
        "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
        "sInfoFiltered": "(Filtrados de _MAX_ registros)",
        "sInfoPostFix": "",
        "sInfoThousands": ".",
        "sLengthMenu": "_MENU_ resultados por página",
        "sLoadingRecords": "Carregando...",
        "sProcessing": "Processando...",
        "sZeroRecords": "Nenhum registro encontrado",
        "sSearch": "Pesquisar",
        "oPaginate": {
            "sNext": "Próximo",
            "sPrevious": "Anterior",
            "sFirst": "Primeiro",
            "sLast": "Último"
        },
         
        "oAria": {
          "sSortDescending": " - click/return to sort descending",
          "sSortAscending": ": Ordenar colunas de forma ascendente"  
        },        
    }
  });

  //APAGANDO FOTO EDITOR
  $('#btn-apgar-foto-editor').on('click', function() {
    
    if(confirm("Você deseja realmente remover essa foto?")) {

      $('.editor-foto').remove();
      $('#input-upload-foto-editor').removeClass('hide');

    }else {

      return false;

    }

  });
  // ATUALIZANDO FOTO EDITORES
  $('#foto_editor').AjaxFileUpload({
    action: "https://canaldenoticiasonline.com.br/upload-foto/",
    onComplete: function( filename, response ) {
      if(response.error == 0) { 
        $("#upload_foto_view").append(
          $("<img />").attr("src", response.url_img).attr("width", 200)
        );

        $("#upload_foto_view").append(
          $("<input />").attr("name", 'foto').attr('value', response.nome_img).attr('type', 'hidden')
        );

      } else {
        alert(response.msg);
      }
    }
  });

  //REMOÇÃO DA IMAGEM - Atualizar banner
  $('#btn-apgar-foto-banner').on('click', function() {
    
    if(confirm("Você deseja realmente remover essa foto?")) {

      $('.foto-banner').remove();
      $('#input-upload-foto-banner').removeClass('hide');

    }else {

      return false;

    }

  });

  $('#img_banner').AjaxFileUpload({
    action: "https://canaldenoticiasonline.com.br/upload-foto-banner/",
    onComplete: function( filename, response ) {
      if(response.error == 0) {
        $("#upload_foto_view_banner").append(
          $("<img />").attr("src", response.url_img).attr("width", 200)
        );

        $("#upload_foto_view_banner").append(
          $("<input />").attr("name", 'img_banner').attr('value', response.nome_img).attr('type', 'hidden')
        );

      } else {
        alert(response.msg);
      }
    }
  });


  //APAGAR IMG NOTICIA
  $('#btn-apgar-foto-noticia').on('click', function() {
    
    if(confirm("Você deseja realmente remover essa foto?")) {

      $('.foto-noticia').remove();
      $('#input-upload-foto-noticia').removeClass('hide');

    }else {

      return false;

    }

  });  
  
  $('#foto_noticia').AjaxFileUpload({
    action: "https://canaldenoticiasonline.com.br/upload-foto-noticia/",
    onComplete: function( filename, response ) {
      if(response.error == 0) {
        $("#upload_foto_view_noticia").append(
          $("<img />").attr("src", response.url_img).attr("width", 200)
        );

        $("#upload_foto_view_noticia").append(
          $("<input />").attr("name", 'img').attr('value', response.nome_img).attr('type', 'hidden')
        );

      } else {
        alert(response.msg);
      }
    }
  });
});




