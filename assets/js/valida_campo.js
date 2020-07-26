function fMasc(objeto,mascara) {//Função que recebe os valores em parametros
  obj=objeto
  masc=mascara
  setTimeout("fMascEx()",1)
}
  function fMascEx() {
  obj.value=masc(obj.value)
}

function mTel(tel) {
  tel=tel.replace(/\D/g,"")
  tel=tel.replace(/^(\d)/,"($1")
  tel=tel.replace(/(.{3})(\d)/,"$1)$2")
   if(tel.length == 9) {
      tel=tel.replace(/(.{1})$/,"-$1")
    } else if (tel.length == 10) {
        tel=tel.replace(/(.{2})$/,"-$1")
    } else if (tel.length == 11) {
        tel=tel.replace(/(.{3})$/,"-$1")
    } else if (tel.length == 12) {
        tel=tel.replace(/(.{4})$/,"-$1")
    } else if (tel.length > 12) {
        tel=tel.replace(/(.{4})$/,"-$1")
    }
      return tel;
}

function mCEP(cep){
  cep=cep.replace(/\D/g,"")
  cep=cep.replace(/^(\d{5})(\d)/,"$1-$2")
  return cep
}