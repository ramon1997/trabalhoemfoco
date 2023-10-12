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