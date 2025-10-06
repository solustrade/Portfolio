function getfocus(Campo) {
   document.getElementById(Campo).focus();
}

function VoltaPagina() {
   history.back(-2);
}

function mascara(Tipo, Campo, Indice, IdForm) {
   var data = Campo.value;
   var frm_element = document.getElementById (IdForm);
   
   if (Tipo == 'CPF') {
      if ((data.length == 3) || (data.length == 7)) {
         data = data + '.';
      }
      if (data.length == 11) {
         data = data + '-';
      }
      
      frm_element[Indice].value = data;
      return true;
   }
   else if (Tipo == 'CNPJ') {
      if ((data.length == 2) || (data.length == 6)) {
         data = data + '.';
      }
      if (data.length == 10) {
         data = data + '/';
      }
      if (data.length == 15) {
         data = data + '-';
      }
      
      frm_element[Indice].value = data;
      return true;
   }
   else if (Tipo == 'DATA') {
      if ((data.length == 2) || (data.length == 5)){
         data = data + '/';
      }
      
      frm_element[Indice].value = data;
      return true;
   }
   else if (Tipo == 'CEP') {
      if (data.length == 5){
         data = data + '-';
      }
      
      frm_element[Indice].value = data;
      return true;
   }
   else if (Tipo == 'TEL') {
      if (data.length == 1){
         data = '(' + data;
      }
      if (data.length == 3){
         data = data + ') ';
      }
   
      if (data.length == 9){
         data = data + '-';
      }
      
      frm_element[Indice].value = data;
      return true;
   }
}

function Numero(e) {
   navegador = /msie/i.test(navigator.userAgent);

   if (navegador)
      var tecla = event.keyCode;
   else
      var tecla = e.which;

   if(tecla > 47 && tecla < 58) // numeros de 0 a 9
      return true;
   else {
      if (tecla != 8 && tecla != 13) // backspace
         return false;
      else
         return true;
   }
}