<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8"> 
    <title>Importar dados do Excel</title>
  </head>
  <body>
    <h1>Upload de arquivo .csv</h1>
    
    <form method="post" action="<?= base_url('csv_processa'); ?>" enctype="multipart/form-data">
      <label>Arquivo</label>
      <input type="file" name="arquivo"><br><br>
      <input type="submit" disabled="disabled" value="Enviar">
    </form>
    
    <h4><p style="color: tomato">Uso somente do desenvolvedor.</p><small><a href="https://canaldenoticiasonline.com.br/administrator">Retornar</a></small></h4>
    
    
  </body>
</html>