//UPLOAD DE FOTOS
  $(document).ready(function () {
  // /**
  // * Função: executa o input(file) com um clique
  // */ 
  	 $("#foto").click(function(){
    	self.executar();
  	 });
	/**
 		* PLUGIN DATA-TABLE
 	*/
	// $('.table_desafio').DataTable();
	// $('.sidebar-menu').tree();
});

/**
  * PLUGIN iCheck
*/
$(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-green',
      increaseArea: '20%' /* optional */
    });
  });

/**
*FOCA UM DETERMINADO CAMPO ASSIM QUE INICIALIZA O SISTEMA
*/
window.onload = function() {
  document.getElementById('first_name').focus();
}

function cliquei(elemento) {
	let i = 1, aux = 0, somaTotal=0;	
	let resgataValor = elemento.value;

	for(i; i<=52; i++) {
		// Logica
		armazenaValor = resgataValor*i;
		aux = armazenaValor;
		somaTotal = somaTotal + aux;
	}

	// enviando para os campos
	document.getElementById('v_inicial').value = Number(resgataValor).toFixed(2);
	document.getElementById('v_final').value = Number(armazenaValor).toFixed(2);
	document.getElementById('v_total').value = Number(somaTotal).toFixed(2);

	// estilização
	document.getElementById('v_inicial').style.border ="2px solid orange";
	document.getElementById('v_final').style.border ="2px solid orange";
	document.getElementById('v_total').style.border ="3px solid orange";
}

// Continuação: Executa o input(file com um clique)
function executar(){
   $('#arquivo').trigger('click');
}

// Mostra a imagem apos ser selecionada pelo usuario
function mostraImagem(img) {
  if (img.files && img.files[0]) {
    let reader = new FileReader();
    let imagem = document.getElementById("foto");
    reader.onload = function(e) {
      imagem.src = e.target.result;
    };

    reader.readAsDataURL(img.files[0]);
  }
}

