var el = document.querySelector("#texto");
var texto = "Trabalho em foco" 
var interval = 200;
function showtexto(el, texto, interval) {
  var va = texto.split("").reverse();
  
  var tipo = setInterval(function() {
  
    if (!va.length) {
        return clearInterval(tipo)
    }
    
    var proximo = va.pop();
    
    el.innerHTML += proximo;
    
  }, interval);
  
}
showtexto(el, texto, interval);

//regex para numero de celular

const handlePhone = (event) => {
  let input = event.target
  input.value = phoneMask(input.value)
}

const phoneMask = (value) => {
  if (!value) return ""
  value = value.replace(/\D/g,'')
  value = value.replace(/(\d{2})(\d)/,"($1) $2")
  value = value.replace(/(\d)(\d{4})$/,"$1-$2")
  return value
}
